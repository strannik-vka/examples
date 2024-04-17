<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAnalytic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'lesson_id', 'percent_video_view', 'views_count', 'is_passed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
