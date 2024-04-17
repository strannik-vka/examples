<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class OpinionAnswerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'answer_data' => 'required|array',
            'user_data' => 'required|array',
            'course_id' => 'required|exists:courses,id'
        ];
    }
}
