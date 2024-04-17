<?php

namespace App\Console\Commands;

use App\Helpers\LessonAnalyticHelper;
use App\Models\LessonAnalytic;
use App\Models\LessonAnalyticGroup;
use App\Models\LessonUser;
use App\Models\TestAnswer;
use Illuminate\Console\Command;

class LessonAnalyticPassed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LessonAnalyticPassed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отметить пройденные уроки';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userLessons = LessonUser::whereNotNull('passed_at')->get();

        foreach ($userLessons as $userLesson) {
            LessonAnalyticHelper::setPassed($userLesson->lesson_id, $userLesson->user_id);
        }

        $this->info('ok');
    }
}
