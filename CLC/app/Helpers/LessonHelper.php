<?php

namespace App\Helpers;

class LessonHelper
{
    public static function nextLessonUrl($lesson)
    {
        if ($lesson) {
            $nextLesson = $lesson->next();

            if ($nextLesson) {
                return route('course.show', $nextLesson->course_id) . '?lesson_id=' . $nextLesson->id;
            }
        }
    }
}
