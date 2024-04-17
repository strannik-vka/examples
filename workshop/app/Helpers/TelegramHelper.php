<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TelegramHelper
{
    public static function send($options)
    {
        Http::post(
            'https://api.telegram.org/bot1148786597:AAHY4lFY-phYb2pnEHfbzDx8dgivnZqeEFE/sendMessage',
            array_merge([
                'chat_id' => -1001722077056,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML',
            ], $options)
        );
    }
}
