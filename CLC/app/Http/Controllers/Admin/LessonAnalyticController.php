<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LessonAnalytic;
use Carbon\Carbon;

class LessonAnalyticController extends Controller
{
    public function index(Request $request)
    {
        $items = LessonAnalytic::with('lesson', 'user')
            ->selectRaw('*, sum(views_count) as views_count_sum, sum(is_passed) as passed_sum')
            ->groupBy('user_id')
            ->orderBy('views_count_sum', 'desc')
            ->latest();

        $items = $this->filter($items, $request);

        return [
            'paginate' => $items->paginate(50),
            // 'charts' => $this->charts()
        ];
    }

    public function filter($items, $request)
    {
        if ($request->has('lesson_name') && $request->lesson_name) {
            $items->whereHas('lesson', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->lesson_name . '%');
            });
        }

        if ($request->has('user_name') && $request->user_name) {
            $items->whereHas('user', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->user_name . '%');
            });
        }

        return $items;
    }

    public function charts()
    {
        $charts = [];

        $LessonAnalytics = LessonAnalytic::with('lesson', 'lesson.course', 'user')
            ->where('created_at', '>', Carbon::now()->addDays(-30));

        $LessonAnalytics = $this->filter($LessonAnalytics, request());
        $LessonAnalytics = $LessonAnalytics->get();

        $statData = [];

        foreach ($LessonAnalytics as $LessonAnalytic) {
            $day = $LessonAnalytic->created_at->format('Y.m.d');

            if (!isset($statData[$LessonAnalytic->lesson->name])) {
                $statData[$LessonAnalytic->lesson->name] = [];
            }

            if (isset($statData[$LessonAnalytic->lesson->name][$day])) {
                $statData[$LessonAnalytic->lesson->name][$day] = ($statData[$LessonAnalytic->lesson->name][$day] + $LessonAnalytic->percent_video_view) / 2;
            } else {
                $statData[$LessonAnalytic->lesson->name][$day] = $LessonAnalytic->percent_video_view;
            }
        }

        $datasets = [];

        foreach ($statData as $key => $item) {
            ksort($item);

            $datasets[] = [
                'label' => $key,
                'data' => $item,
            ];
        }

        $charts[] = [
            'title' => 'Средний процент просмотра видео по дням',
            'config' => [
                'type' => 'line',
                'data' => [
                    'datasets' => $datasets
                ]
            ]
        ];

        return $charts;
    }
}
