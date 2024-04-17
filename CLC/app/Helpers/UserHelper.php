<?php

namespace App\Helpers;

use App\Models\User;

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
}
