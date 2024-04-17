<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'birthday' => 'Формат даты: ' . date('d.m.Y'),
            'photo.mimes' => 'Поддерживаемые форматы: jpg, png, jpeg',
            'photo.max' => 'Максимальный размер 20 мб.',
        ];
    }

    public function rules(): array
    {
        $data = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'about' => ['nullable', 'string', 'max:65535'],
            'birthday' => ['required', 'date'],
            'phone' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'social_networks' => ['nullable', 'string', 'max:65535'],
            'place_work' => ['nullable', 'string', 'max:255'],
            'portfolio' => ['nullable', 'string', 'max:65535'],
        ];

        if (request()->hasFile('photo')) {
            $data['photo'] = ['image', 'mimes:jpg,png,jpeg', 'max:20048'];
        }

        if (request('password')) {
            $data['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }

        return $data;
    }
}
