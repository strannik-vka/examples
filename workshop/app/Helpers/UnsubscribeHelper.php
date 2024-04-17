<?php

namespace App\Helpers;

use App\Models\Unsubscribe;

class UnsubscribeHelper
{
    public static function store($email)
    {
        if ($email) {
            $UnsubscribeCount = Unsubscribe::where('email', $email)->count();

            if ($UnsubscribeCount == 0) {
                Unsubscribe::create([
                    'email' => $email
                ]);
            }
        }
    }
}
