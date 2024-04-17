<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserHelper
{
    public static $thumbs = [
        [500]
    ];

    public static function getGroup($group_id, $key = null)
    {
        $result = '';

        foreach (User::$groups as $group) {
            if ($group['id'] == $group_id) {
                $result = $group;
                break;
            }
        }

        if ($key) {
            return isset($result[$key]) ? $result[$key] : $result;
        }

        return $result;
    }

    public static function sendAccountAccesses($user, $password, $options = [])
    {
        $options = (object) $options;

        if (!isset($options->subject)) {
            $options->subject = 'Доступ в личный кабинет: Лагерь Креативных Лидеров';
        }

        if (!isset($options->view)) {
            $options->view = 'mailing.access_account';
        }

        try {
            Mail::send($options->view, [
                'user' => $user,
                'password' => $password,
                'urlUnSubscribe' => route('mailing.unsubscribe') . '?id=' . $user->id . '&email=' . $user->email,
            ], function ($message) use ($user, $options) {
                $message
                    ->to($user->email)
                    ->subject($options->subject);
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
