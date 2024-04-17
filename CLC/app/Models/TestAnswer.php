<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'test_id', 'answer', 'correct_answers_count',
        'text',
    ];

    protected $casts = [
        'answer' => 'array'
    ];

    public function userPoints()
    {
        $result = 0;

        if ($this->test && is_array($this->answer)) {
            $answers = [];

            foreach ($this->test->content as $item) {
                $key = array_key_first($item);
                $value = $item[$key];

                if (isset($value['switched'])) {
                    $answers[$key] = $value['switched'];
                }
            }

            foreach ($this->answer as $id => $item) {
                if (isset($answers[$id])) {
                    $values = is_array($item) ? $item : [$item];

                    foreach ($values as $value) {
                        $value = ((int) $value) + 1;

                        if (in_array($value, $answers[$id])) {
                            $result++;
                        }
                    }
                }
            }
        }

        return $result;
    }

    public function maxPoints()
    {
        $count = 0;

        if ($this->test && is_array($this->answer)) {
            foreach ($this->test->content as $item) {
                $key = array_key_first($item);
                $value = $item[$key];

                if (isset($value['switched']) && is_array($value['switched'])) {
                    $count += count($value['switched']);
                }
            }
        }

        return $count;
    }

    public function isPassed($questionsCount = 0)
    {
        if ($this->test) {
            $questionsCount = $questionsCount ? $questionsCount : $this->test->questionsCount();

            if ($questionsCount && $this->correct_answers_count) {
                $percent = $questionsCount / $this->correct_answers_count;
                $percent = 100 / $percent;

                return $percent >= 50;
            }
        }

        return false;
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
