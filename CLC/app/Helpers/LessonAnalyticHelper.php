<?php

namespace App\Helpers;

use App\Models\LessonAnalytic;
use App\Models\LessonAnalyticGroup;

class LessonAnalyticHelper
{
    public static function setPassed($lesson_id, $user_id)
    {
        $lesson_analytic = LessonAnalytic::where([
            ['user_id', $user_id],
            ['lesson_id', $lesson_id]
        ])->first();

        if ($lesson_analytic) {
            $lesson_analytic->is_passed = 1;
            $lesson_analytic->save();
        }
    }

    public static function store($lesson)
    {
        $lesson_analytic = LessonAnalytic::where([
            ['user_id', request()->user()->id],
            ['lesson_id', $lesson->id]
        ])->first();

        if ($lesson_analytic) {
            $lesson_analytic->views_count++;
            $lesson_analytic->save();
        } else {
            LessonAnalytic::create([
                'user_id' => request()->user()->id,
                'lesson_id' => $lesson->id
            ]);
        }

        self::storeLessonAnalyticGroup($lesson, !$lesson_analytic);
    }

    public static function storeLessonAnalyticGroup($lesson, $newUser = false)
    {
        $LessonAnalyticGroup = LessonAnalyticGroup::where('lesson_id', $lesson->id)->first();

        if ($LessonAnalyticGroup) {
            if ($newUser) {
                $LessonAnalyticGroup->users_count++;
            }

            $LessonAnalyticGroup->views_count++;
            $LessonAnalyticGroup->save();
        } else {
            LessonAnalyticGroup::create([
                'course_id' => $lesson->course->id,
                'lesson_id' => $lesson->id,
                'users_count' => 1,
                'views_count' => 1,
                'answers_count' => 0,
            ]);
        }
    }

    public static function addAnswersCount($lesson)
    {
        $LessonAnalyticGroup = LessonAnalyticGroup::where('lesson_id', $lesson->id)->first();

        if ($LessonAnalyticGroup) {
            $LessonAnalyticGroup->answers_count++;
            $LessonAnalyticGroup->save();
        }
    }
}
