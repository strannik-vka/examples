<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TestAnswerResource extends JsonResource
{
    public function toArray($request)
    {
        $answers = [];

        if ($this->test && is_array($this->answer)) {
            if (isset($this->test->content) && is_array($this->test->content)) {
                foreach ($this->answer as $poll_id => $value_index) {
                    foreach ($this->test->content as $item) {
                        if (isset($item[$poll_id])) {
                            $user_indexes = is_array($value_index) ? $value_index : [$value_index];
                            $answer_texts = [];

                            foreach ($user_indexes as $i) {
                                if (isset($item[$poll_id]['variant'][$i])) {
                                    $answer_texts[] = $item[$poll_id]['variant'][$i];
                                }
                            }

                            $answers[] = $item[$poll_id]['question'] . ': ' . implode('; ', $answer_texts);
                        }
                    }
                }
            }
        }

        $answers = implode("\n", $answers);

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => $this->user,
            'test_id' => $this->test_id,
            'test' => $this->test,
            'answers' => $answers,
            'text' => $this->text,
            'comment' => $this->comment,
            'file' => $this->file,
            'correct_answers_count' => $this->correct_answers_count,
            'updated_at' => $this->updated_at,
        ];
    }
}
