<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',
        ];
    }
}
