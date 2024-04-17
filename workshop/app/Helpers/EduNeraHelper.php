<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class EduNeraHelper
{
    public static $token = 'XJlk0vTsrgeP90WvsB=i5sw0/9rrY1IW2Vgpoj?rPbGFlSoElV=jBIJ4wWPW4j-g';

    public static function domain()
    {
        return config('app.url') == 'https://workshop.nera.one'
            ? 'https://edu.nera.one'
            : 'http://edu.nera.test';
    }

    public static function ExternalSaleStore($params)
    {
        $params['token'] = self::$token;

        $response = Http::post(self::domain() . '/api/external-sale/store', $params);

        $object = $response->object();

        return isset($object->data) ? $object->data : $object;
    }
}
