<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormMeetingRequest;
use App\Models\FormMeeting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class FormMeetingController extends Controller
{
    public function store(FormMeetingRequest $request)
    {
        $key = 'FormMeeting:' . $request->phone . ':' . $request->email;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            return [
                'errors' => [
                    'email' => 'Разрешается в минута 1 отправка'
                ]
            ];
        }

        RateLimiter::hit($key);

        FormMeeting::create($request->all());

        Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
            'chat_id' => -1001920072961,
            'disable_web_page_preview' => true,
            'parse_mode' => 'HTML',
            'text' => "<b>ЗАЯВКА НА ВСТРЕЧУ</b>\nИмя: $request->name\nФамилия: $request->lastname\nТелефон: $request->phone\nEmail: $request->email"
        ]);

        return ['success' => true];
    }
}
