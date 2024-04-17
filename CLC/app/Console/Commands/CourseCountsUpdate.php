<?php

namespace App\Console\Commands;

use App\Models\LessonUser;
use Illuminate\Console\Command;

class CourseCountsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course_count_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lessonsUsers = LessonUser::with('lesson.course')->get();
        $users = [];

        foreach ($lessonsUsers as $item) {
            if (in_array($item->user_id, $users) === false) {
                $users[] = $item->user_id;
                if (isset($item->lesson->course)) {
                    $item->lesson->course->lessons_start_count++;
                    $item->lesson->course->save();
                }
            }
        }
    }
}
