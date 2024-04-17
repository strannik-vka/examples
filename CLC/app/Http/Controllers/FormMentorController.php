<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormMentorRequest;
use App\Models\FormMentor;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class FormMentorController extends Controller
{
    public function store(FormMentorRequest $request)
    {
        $key = 'FormMentor:' . $request->phone . ':' . $request->email;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            return [
                'errors' => [
                    'email' => 'Разрешается в минута 1 отправка'
                ]
            ];
        }

        RateLimiter::hit($key);

        FormMentor::create($request->all());

        Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
            'chat_id' => -1001920072961,
            'disable_web_page_preview' => true,
            'parse_mode' => 'HTML',
            'text' => "<b>ЗАЯВКА НА НАСТАВНИЧЕСТВО</b>\nИмя: $request->name\nФамилия: $request->lastname\nТелефон: $request->phone\nEmail: $request->email"
        ]);

        return ['success' => true];
    }
}
