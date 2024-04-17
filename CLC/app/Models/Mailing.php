<?php

namespace App\Models;

use App\Classes\Filter;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Mailing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sort', 'view', 'status_id', 'users_filter', 'last_user_id', 'count_send', 'count_all', 'email_list'
    ];

    protected $casts = [
        'email_list' => 'array'
    ];

    public static $statuses = [
        [
            'id' => 0,
            'name' => 'Остановлен'
        ],
        [
            'id' => 1,
            'name' => 'Запущен'
        ],
        [
            'id' => 2,
            'name' => 'Пуза'
        ],
        [
            'id' => 3,
            'name' => 'Готово'
        ]
    ];

    public static function filter($filter)
    {
        $filter = urldecode($filter);

        $result = [];

        if (strpos($filter, '?') !== false) {
            $filter = explode('?', $filter);
            $filter = $filter[1];
        }

        $filter = explode('&', $filter);

        foreach ($filter as $item) {
            $item_arr = explode('=', $item);
            if (count($item_arr) == 2) {
                $key = explode('[', $item_arr[0]);
                $key = $key[0];

                if (strpos($item_arr[0], '[') !== false) {
                    if (!isset($result[$key])) {
                        $result[$key] = [];
                    }

                    $result[$key][] = $item_arr[1];
                } else {
                    $result[$key] = $item_arr[1];
                }
            }
        }

        return $result;
    }

    public static function run()
    {
        $mailing = self::where('status_id', 1)->orderBy('updated_at', 'asc')->first();

        if ($mailing) {
            $Mail = Str::ucfirst($mailing->view) . 'Mail';
            $Mail = str_replace('/', '', '\App\Mail\/' . $Mail);
            $Mail_arr = explode('_', $Mail);
            $Mail = '';
            foreach ($Mail_arr as $Mail_str) {
                $Mail .= Str::ucfirst($Mail_str);
            }

            $email_list = is_array($mailing->email_list) ? array_filter($mailing->email_list) : [];

            if (count($email_list) > 0) {
                $next_email = $email_list[$mailing->count_send];

                $user = User::where('email', $next_email)->first();

                try {
                    Mail::to($user ? $user : $next_email)->send(new $Mail($user ? $user : $next_email));
                } catch (Exception $e) {
                    Log::info('Не отправилось письмо на: ' . $next_email . "\n" . 'Причина: ' . $e->getMessage());
                }

                $update = [
                    'count_send' => $mailing->count_send + 1
                ];
            } else {
                $filter = Mailing::filter($mailing->users_filter);

                $next_users = User::orderBy('id', 'asc')->limit(2);
                $next_users = Filter::apply(['id', 'name', 'email', 'group_id', 'subtype_id'], $filter, $next_users);

                if ($mailing->last_user_id) {
                    $next_users = $next_users->where('id', '>', $mailing->last_user_id)->get();
                } else {
                    $next_users = $next_users->get();
                }

                $update = [
                    'count_send' => $mailing->count_send + count($next_users)
                ];

                if (count($next_users) > 0) {
                    foreach ($next_users as $user) {
                        $update['last_user_id'] = $user->id;

                        try {
                            Mail::to($user)->send(new $Mail($user));
                        } catch (Exception $e) {
                            Log::info('Не отправилось письмо на: ' . $user->email);
                        }
                    }
                }
            }

            // if (!Mail::failures()) {
            if ($update['count_send'] == $mailing->count_all) {
                $update['status_id'] = 3;
            }

            $mailing->update($update);
            // }
        }
    }

    public static function views()
    {
        $mail_views = array_diff(
            scandir(dirname(dirname(__DIR__)) . '/resources/views/mailing'),
            ['..', '.', 'data']
        );

        $result = [];

        foreach ($mail_views as $mail_view) {
            $result[] = str_replace('.blade.php', '', $mail_view);
        }

        return $result;
    }
}
