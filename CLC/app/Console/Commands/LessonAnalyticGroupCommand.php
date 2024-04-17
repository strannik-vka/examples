<?php

namespace App\Console\Commands;

use App\Helpers\LessonAnalyticHelper;
use App\Models\LessonAnalytic;
use App\Models\LessonAnalyticGroup;
use App\Models\TestAnswer;
use Illuminate\Console\Command;

class LessonAnalyticGroupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LessonAnalyticGroupCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Формирование данных в таблице';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $LessonAnalytics = LessonAnalytic::with('lesson')
            ->selectRaw('*, sum(views_count) as views_count_sum, count(user_id) as users_count')
            ->groupBy('lesson_id')
            ->orderBy('created_at', 'asc')
            ->get();

        foreach ($LessonAnalytics as $item) {
            LessonAnalyticGroup::create([
                'course_id' => $item->lesson->course_id,
                'lesson_id' => $item->lesson->id,
                'users_count' => $item->users_count,
                'views_count' => $item->views_count_sum,
                'answers_count' => 0,
                'updated_at' => $item->updated_at,
                'created_at' => $item->created_at,
            ]);
        }

        $test_answers = TestAnswer::with('test.lesson')->get();

        foreach ($test_answers as $test_answer) {
            if (isset($test_answer->test->lesson) && $test_answer->test->lesson) {
                LessonAnalyticHelper::addAnswersCount($test_answer->test->lesson);
            }
        }
    }
}
