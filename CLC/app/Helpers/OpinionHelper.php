<?php

namespace App\Helpers;

use App\Models\Opinion;
use App\Models\OpinionAnswer;

class OpinionHelper
{
    public static $industries = [
        [
            'id' => 1,
            'name' => 'Кино, радио и телевидение'
        ],
        [
            'id' => 2,
            'name' => 'Музыка и саунд-дизайн'
        ],
        [
            'id' => 3,
            'name' => 'Сфера IT, разработка компьютерных игр'
        ],
        [
            'id' => 4,
            'name' => 'Дизайн'
        ],
        [
            'id' => 5,
            'name' => 'НХП, ремесленничество'
        ],
        [
            'id' => 6,
            'name' => 'Театры, музеи'
        ],
        [
            'id' => 7,
            'name' => 'Архитектура и урбанистика'
        ],
        [
            'id' => 8,
            'name' => 'Образование в КИ'
        ],
        [
            'id' => 9,
            'name' => 'Издательское дело'
        ],
        [
            'id' => 10,
            'name' => 'Мода'
        ],
        [
            'id' => 11,
            'name' => 'Маркетинг и реклама, новые медиа'
        ],
        [
            'id' => 12,
            'name' => 'Креативные пространства и кластеры'
        ],
        [
            'id' => 13,
            'name' => 'Арт-индустрия'
        ],
        [
            'id' => 14,
            'name' => 'Гастрономия'
        ],
        [
            'id' => 15,
            'name' => 'Другое'
        ],
    ];

    public static function getIndustry($id)
    {
        $result = null;

        foreach (self::$industries as $industry) {
            if ($industry['id'] == $id) {
                $result = $industry;
                break;
            }
        }

        return $result;
    }

    public static function hasAnswer($course_id, $user_id)
    {
        $opinion = Opinion::find($course_id);

        if ($opinion) {
            return OpinionAnswer::where([
                ['opinion_id', $opinion->id],
                ['user_id', $user_id]
            ])->count();
        }

        return false;
    }

    public static function isHorizontalVariants($answerField)
    {
        if (isset($answerField->value['variants'][0]['text'])) {
            return $answerField->value['variants'][0]['text'] == '1';
        }

        return false;
    }
}
