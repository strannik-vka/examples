<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscribeMail;
use App\Models\Subscribe;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class SubscribeController extends Controller
{
    public function store(SubscribeRequest $request)
    {
        $key = 'subscribe:' . $request->type_id . ':' . $request->email;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            return [
                'errors' => [
                    'email' => 'Разрешается в минута 1 отправка'
                ]
            ];
        }

        RateLimiter::hit($key);

        $subscribe = Subscribe::where([
            ['email', $request->email],
            ['type_id', $request->type_id]
        ])->count();

        if ($subscribe == 0) {
            Subscribe::create($request->all());

            $TEXTS = [
                1 => 'УЗНАТЬ О ЗАПУСКЕ ПЕРВЫМ',
                2 => 'АКТУАЛЬНЫЕ НОВОСТИ',
                3 => 'ЧЕК-ЛИСТ ЭФФЕКТИВНОСТИ УПРАВЛЕНИЯ',
            ];

            $text = $TEXTS[$request->type_id];

            Http::post('https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage', [
                'chat_id' => -1001920072961,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML',
                'text' => "<b>$text</b>\nНовая подписка\nemail: $request->email"
            ]);
        }

        if ($request->type_id == '1' || $request->type_id == '3') {
            try {
                Mail::to([
                    ['email' => $request->email]
                ])->send(new SubscribeMail($request->type_id));
            } catch (Exception $e) {
                Log::info('Не отправилось письмо чек-лист: ' . $request->email . ', ' . $e->getMessage());
            }
        }

        return ['success' => true];
    }

    public function unsubscribe(Request $request)
    {
        if ($request->email && $request->id) {
            $Subscribe = Subscribe::where([
                ['email', $request->email],
                ['id', $request->id]
            ])->first();

            if ($Subscribe) {
                Subscribe::destroy($Subscribe->id);

                return view('mailing.unsubscribe');
            } else {
                $user = User::where([
                    ['email', $request->email],
                    ['id', $request->id]
                ])->first();

                if ($user) {
                    $user->subtype_id = 2;
                    $user->save();

                    return view('mailing.unsubscribe');
                }
            }
        }

        return response()->view('errors.404', [], 404);
    }
}
