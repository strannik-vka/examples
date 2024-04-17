<?php

namespace App\Classes;

class ProgressMap
{
    public static function get($lessons)
    {
        $lessonsCount = 0;
        $lessonsViewCount = 0;

        foreach ($lessons as $lesson) {
            if ($lesson->number) {
                if ($lesson->user) {
                    $lessonsViewCount++;
                }

                $lessonsCount++;
            }
        }

        return [
            'lessonsCount' => $lessonsCount,
            'lessonsViewCount' => $lessonsViewCount,
        ];
    }
}
