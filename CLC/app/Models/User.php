<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'about',
        'birthday',
        'phone',
        'city',
        'social_networks',
        'place_work',
        'portfolio',
        'password',
        'position'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_online_at' => 'datetime',
        'birthday' => 'date'
    ];

    public static $groups = [
        [
            'id' => 1,
            'name' => 'Обычный',
            'slug' => 'user'
        ],
        [
            'id' => 2,
            'name' => 'Администратор',
            'slug' => 'admin'
        ],
        [
            'id' => 3,
            'name' => 'Эксперт',
            'slug' => 'expert'
        ],
        [
            'id' => 4,
            'name' => 'Проверка заявок',
            'slug' => 'applicationModer'
        ],
        [
            'id' => 5,
            'name' => 'Проверка экспертов',
            'slug' => 'expertModer'
        ]
    ];

    public static $subtypes = [
        [
            'id' => 1,
            'name' => 'Подписчик',
            'slug' => 'subs'
        ],
        [
            'id' => 2,
            'name' => 'Отписавшийся',
            'slug' => 'unsubs'
        ]
    ];

    public function getGroup($key = null)
    {
        $result = null;

        foreach (self::$groups as $group) {
            if ($group['id'] == $this->group_id) {
                $result = $group;
                break;
            }
        }

        return $key ? $result[$key] : $result;
    }

    public function getSubType($key = null)
    {
        $result = null;

        foreach (self::$subtypes as $subtype) {
            if ($subtype['id'] == $this->subtype_id) {
                $result = $subtype;
                break;
            }
        }

        return $key ? $result[$key] : $result;
    }
}
