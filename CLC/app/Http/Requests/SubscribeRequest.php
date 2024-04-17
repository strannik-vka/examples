<?php

namespace App\Http\Requests;

use App\Models\Subscribe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscribeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns',
            'type_id' => ['required', Rule::in(array_keys(Subscribe::$types))]
        ];
    }
}
