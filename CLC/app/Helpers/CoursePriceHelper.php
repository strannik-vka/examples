<?php

namespace App\Helpers;

use App\Models\CoursePrice;

class CoursePriceHelper
{
    public static function find($course_id)
    {
        $CoursePrice = CoursePrice::where('course_id', $course_id)
            ->orderBy('id', 'desc')
            ->first();

        if ($CoursePrice) {
            if ($CoursePrice->amount > 0) {
                return $CoursePrice;
            }
        }

        return null;
    }
}
