<?php

namespace App\Http\Requests\Course;

use App\Models\Test;
use Illuminate\Foundation\Http\FormRequest;

class TestAnswerRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'test_id' => 'required|exists:tests,id',
        ];

        if (request()->has('answer')) {
            $data['answer'] = 'required|array';
        }

        if (request()->has('text')) {
            $data['text'] = 'required|max:65535|string';
        }

        $test = Test::find(request('test_id'));
        if ($test->isInputFile) {
            $data['file'] = 'required|mimes:pdf,png,jpg,jpeg,webp|max:15360';
        }

        return $data;
    }
}
