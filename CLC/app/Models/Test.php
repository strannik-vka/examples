<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id', 'name', 'description',
        'duration', 'results',
        'isInputText', 'isInputFile'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function answer()
    {
        return $this->hasOne(TestAnswer::class);
    }

    public function questionsCount()
    {
        $result = 0;

        if ($this->content) {
            foreach ($this->content as $item) {
                $key = array_key_first($item);

                if (strpos($key, 'poll') !== false) {
                    $result++;
                }
            }
        }

        return $result;
    }

    public function isPassed()
    {
        return $this->answer && $this->answer->isPassed();
    }

    public function getStatus($lesson)
    {
        $statuses = [
            0 => (object) [
                'name' => 'Откроется<br><span class="text-nowrap">' . $lesson->start_at->format('d.m') . '</span>',
                'icon' => 'lock',
            ],
            1 => (object) [
                'name' => 'Не пройдено',
                'icon' => 'edit'
            ],
            2 => (object) [
                'name' => '<span class="text-blue">Пройдено</span>',
                'icon' => 'success'
            ],
        ];

        if (!$lesson->isStart()) {
            return $statuses[0];
        }

        if ($this->isPassed()) {
            return $statuses[2];
        }

        return $statuses[1];
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function isLast()
    {
        if (isset($this->lesson->course) && $this->lesson->course) {
            $lastTest = $this->lesson->course->tests()->orderBy('start_at', 'desc')->first();
            return $lastTest->id == $this->id;
        }

        return false;
    }
}
