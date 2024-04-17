<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
    ];

    protected $casts = [
        'answer_fields' => 'array',
        'user_fields' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function isPassed()
    {
        return false;
    }

    public function getStatus()
    {
        $statuses = [
            0 => (object) [
                'name' => '<span class="text-blue">Пройдено</span>',
                'icon' => 'success'
            ],
            1 => (object) [
                'name' => 'Не пройдено',
                'icon' => 'edit'
            ],
        ];

        return $this->isPassed() ? $statuses[0] : $statuses[1];
    }
}
