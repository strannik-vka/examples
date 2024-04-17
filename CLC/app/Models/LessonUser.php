<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'lesson_id', 'open_at', 'passed_at'
    ];

    protected $casts = [
        'open_at' => 'datetime',
        'passed_at' => 'datetime',
        'videoViewedSegments' => 'array'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function videoViewPercent()
    {
        $result = 0;

        if ($this->videoDuration && $this->videoViewedSegments) {
            $viewDuration = 0;

            foreach ($this->videoViewedSegments as $segment) {
                if (count($segment) == 2) {
                    $viewDuration += (float) $segment[1] - (float) $segment[0];
                }
            }

            if ($viewDuration) {
                $result = round(100 / ($this->videoDuration / $viewDuration));
            }
        }

        return $result;
    }
}
