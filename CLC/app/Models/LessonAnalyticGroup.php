<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAnalyticGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lesson_id',
        'users_count',
        'views_count',
        'answers_count'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
