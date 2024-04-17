<?php

namespace App\Helpers;

class RutubeHelper
{
    public static function getId($url)
    {
        if ($url) {
            $arr = strpos($url, 'private') !== false
                ? explode('private/', $url)
                : explode('video/', $url);

            if (isset($arr[1])) {
                $arr = explode('/', $arr[1]);

                return $arr[0]; // 2def26e1c34ff9dcf44f3caafa21f343
            }
        }

        return null;
    }

    public static function getP($url)
    {
        $query_str = parse_url($url, PHP_URL_QUERY);
        parse_str($query_str, $query_params);

        return isset($query_params['p']) ? $query_params['p'] : null;
    }
}
