<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function tests()
    {
        return $this->hasManyThrough(Test::class, Lesson::class);
    }

    public function sumTestResultPoints()
    {
        $result = 0;

        $tests = $this->tests()->get();

        foreach ($tests as $test) {
            if (isset($test->answer->correct_answers_count)) {
                $result += $test->answer->correct_answers_count;
            }
        }

        return $result;
    }

    public function isPassed()
    {
        $course = self::with([
            'lessons.user' => function ($query) {
                $query->where('user_id', request()->user()->id);
            }
        ])->find($this->id);

        if (count($course->lessons)) {
            $isPassed = true;

            foreach ($course->lessons as $lesson) {
                if (!$lesson->isPassed()) {
                    $isPassed = false;

                    break;
                }
            }

            return $isPassed;
        }

        return false;
    }
}
