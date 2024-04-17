<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Filter;
use App\Http\Controllers\Controller;
use App\Models\LessonAnalyticGroup;

class LessonAnalyticGroupController extends Controller
{
    public function index()
    {
        $items = LessonAnalyticGroup::with('lesson', 'course')->orderBy('created_at', 'asc');

        $items = $this->_filter($items);

        return [
            'paginate' => $items->paginate(50),
            'charts' => $this->charts(),
            'items' => [
                'result' => [
                    'users_count' => $items->sum('users_count'),
                    'views_count' => $items->sum('views_count'),
                    'answers_count' => $items->sum('answers_count'),
                ]
            ],
        ];
    }

    public function _filter($items)
    {
        $items = Filter::apply([
            'users_count', 'views_count', 'answers_count',
        ], request(), $items);

        if (request()->has('course_name') && request()->lesson_name) {
            $items->whereHas('course', function ($query) {
                return $query->where('name', 'like', '%' . request()->course_name . '%');
            });
        }

        if (request()->has('lesson_name') && request()->lesson_name) {
            $items->whereHas('lesson', function ($query) {
                return $query->where('name', 'like', '%' . request()->lesson_name . '%');
            });
        }

        return $items;
    }

    public function charts()
    {
        $charts = [];

        $LessonAnalytics = LessonAnalyticGroup::with('lesson', 'course')
            ->orderBy('created_at', 'asc')->get();

        $labels = [];

        $datasets = [
            [
                'label' => 'Кол-во заходов',
                'data' => [],
            ],
            [
                'label' => 'Кол-во пользователей',
                'borderColor' => 'blue',
                'data' => [],
            ],
            [
                'label' => 'Кол-во домашек',
                'borderColor' => 'green',
                'data' => [],
            ]
        ];

        foreach ($LessonAnalytics as $index => $LessonAnalytic) {
            $label = ($index + 1) . ' урок';

            $labels[] = $label;

            $datasets[0]['data'][] = $LessonAnalytic->views_count;
            $datasets[1]['data'][] = $LessonAnalytic->users_count;
            $datasets[2]['data'][] = $LessonAnalytic->answers_count;
        }

        $charts[] = [
            'config' => [
                'type' => 'line',
                'data' => [
                    'labels' => $labels,
                    'datasets' => $datasets
                ]
            ]
        ];

        return $charts;
    }
}
