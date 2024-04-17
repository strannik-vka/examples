<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'task', 'start_at', 'course_id',
        'category_id', 'contents', 'links', 'duration', 'video_code',
        'number', 'block', 'shortName'
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'speaker' => 'array',
    ];

    public static $speaker_thumb = [
        [500]
    ];

    public static $thumb = [
        [640]
    ];

    public function access()
    {
        if ($this->number == 0) {
            return true;
        }

        if (!$this->isStart()) {
            return false;
        }

        if ($this->isPassedPrevLesson) {
            return true;
        }

        return false;
    }

    public function isStart()
    {
        return Carbon::now('Europe/Moscow')->isAfter($this->start_at);
    }

    public function isPassed()
    {
        return $this->user && $this->user->passed_at;
    }

    public function isOpen()
    {
        return $this->user && $this->user->open_at;
    }

    public function correctPrevTest()
    {
        if (isset($this->passedPrevTest)) {
            return $this->passedPrevTest;
        }

        return true;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function isLast()
    {
        $lastLesson = self::where('course_id', $this->course_id)->orderBy('number', 'desc')->first();

        return $lastLesson->id == $this->id;
    }

    public function next()
    {
        return self::where([
            ['course_id', $this->course_id],
            ['number', '>', $this->number]
        ])->orderBy('number', 'asc')->first();
    }

    public function prev()
    {
        if (Auth::check()) {
            return self::with([
                'user' => function ($query) {
                    $query->where('user_id', request()->user()->id);
                }
            ])->where([
                ['course_id', $this->course_id],
                ['number', '<', $this->number]
            ])->orderBy('number', 'desc')->first();
        }

        return self::where([
            ['course_id', $this->course_id],
            ['number', '<', $this->number]
        ])->orderBy('number', 'desc')->first();
    }

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function user()
    {
        return $this->hasOne(LessonUser::class, 'lesson_id');
    }

    public function getUser()
    {
        return LessonUser::where([
            ['user_id', request()->user()->id],
            ['lesson_id', $this->id]
        ])->first();
    }

    public function setUser($array = [])
    {
        if ($this->number == 0) {
            $array['passed'] = true;
        }

        return LessonUser::create([
            'open_at' => date('Y-m-d H:i:s'),
            'user_id' => request()->user()->id,
            'lesson_id' => $this->id,
            'passed_at' => isset($array['passed']) && $array['passed'] ? date('Y-m-d H:i:s') : null,
        ]);
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
            2 => (object) [
                'name' => 'Откроется ' . $this->start_at->format('d.m'),
                'icon' => 'lock',
            ],
        ];

        if (!$this->isStart()) {
            return $statuses[2];
        }

        return $this->isPassed() ? $statuses[0] : $statuses[1];
    }

    public function notification()
    {
        return $this->morphOne(Notification::class, 'notificateable');
    }
}
