<?php

namespace App\Helpers;

use App\Models\VerifyCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class VerifyCodeHelper
{
    public static function get($length = 4)
    {
        $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $res = '';

        for ($i = 0; $i < $length; $i++) {
            $res .= $arr[random_int(0, count($arr) - 1)];
        }

        return $res;
    }

    public static function store($user)
    {
        $code = self::get();

        $VerifyCode = VerifyCode::where('user_id', $user->id)->first();

        if ($VerifyCode) {
            $VerifyCode->update([
                'code' => $code
            ]);
        } else {
            $VerifyCode = VerifyCode::create([
                'user_id' => $user->id,
                'code' => $code
            ]);
        }

        try {
            Mail::send('mailing.activation', [
                'user' => $user,
                'code' => $code,
            ], function ($message) use ($user) {
                $message
                    ->to($user->email)
                    ->subject('Код для активации вашей учетной записи');
            });
        } catch (\Exception) {
        }
    }

    public static function check($user, $code = null)
    {
        $VerifyCode = VerifyCode::where('user_id', $user->id)->first();

        if ($VerifyCode) {
            return $VerifyCode->code == $code;
        }

        return false;
    }

    public static function activate($user)
    {
        $user->email_verified_at = Carbon::now();
        $user->save();

        try {
            Mail::send('mailing.activated', [
                'user' => $user
            ], function ($message) use ($user) {
                $message
                    ->to($user->email)
                    ->subject('Аккаунт успешно активирован!');
            });
        } catch (\Exception) {
        }

        self::destroy($user);
    }

    public static function destroy($user)
    {
        VerifyCode::where('user_id', $user->id)->delete();
    }
}
