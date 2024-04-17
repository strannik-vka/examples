<?php

namespace App\Helpers;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class LeadersCompetitionHelper
{
    public static function isWinner($application)
    {
        return $application ? $application->status_id == 3 : false;
    }

    public static function winnerIsFound()
    {
        return Application::where('status_id', 3)->count() > 0;
    }

    public static function applicationsDeadline()
    {
        return Carbon::parse('14-09-2023 00:00:00');
    }

    public static function applicationsDeadlineIsUp()
    {
        return Carbon::now()->isAfter(self::applicationsDeadline());
    }

    public static $statuses = [
        [
            'id' => 1,
            'name' => 'Принято'
        ],
        [
            'id' => 2,
            'name' => 'Отклонено'
        ],
        // [
        //     'id' => 3,
        //     'name' => 'Победитель'
        // ],
    ];

    public static $activitySpheres = [
        [
            'id' => 1,
            'name' => 'Кино, видео и фотография'
        ],
        [
            'id' => 3,
            'name' => 'Телевидение и радио'
        ],
        [
            'id' => 4,
            'name' => 'Музыка и саунд-дизайн'
        ],
        [
            'id' => 6,
            'name' => 'Архитектура и урбанистика'
        ],
        [
            'id' => 8,
            'name' => 'Реклама и маркетинг, новые медиа'
        ],
        [
            'id' => 10,
            'name' => 'Дизайн'
        ],
        [
            'id' => 12,
            'name' => 'Мода'
        ],
        [
            'id' => 14,
            'name' => 'Издательское дело'
        ],
        [
            'id' => 16,
            'name' => 'IT, компьютерные игры и ПО'
        ],
        [
            'id' => 2,
            'name' => 'Исполнительское и теат-ральное искусство, фестивали'
        ],
        [
            'id' => 5,
            'name' => 'Музеи, галереи и креативные кластеры'
        ],
        [
            'id' => 7,
            'name' => 'Ремесла'
        ],
        [
            'id' => 9,
            'name' => 'Гастрономия'
        ],
        [
            'id' => 11,
            'name' => 'Образование в КИ'
        ],
        [
            'id' => 13,
            'name' => 'Изобразительное искусство'
        ],
        [
            'id' => 15,
            'name' => 'Исследования и разработки, в том числе R&D'
        ],
    ];

    public static function activitySphereIds()
    {
        return Arr::pluck(self::$activitySpheres, 'id');
    }

    public static function modelActivitySpheres($activity_spheres, $key = null)
    {
        $result = [];

        if ($activity_spheres) {
            foreach (self::$activitySpheres as $item) {
                if (in_array($item['id'], $activity_spheres)) {
                    $result[] = $item;
                }
            }
        }

        if ($key) {
            return Arr::pluck($result, $key);
        }

        return $result;
    }
}
