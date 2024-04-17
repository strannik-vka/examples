<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserHelper
{
    public static function sendAccountAccesses($user, $password, $options = [])
    {
        $options = (object) $options;

        if (!isset($options->subject)) {
            $options->subject = 'Доступ в личный кабинет';
        }

        if (!isset($options->view)) {
            $options->view = 'mailing.access_account';
        }

        try {
            Mail::send($options->view, [
                'user' => $user,
                'password' => $password,
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
