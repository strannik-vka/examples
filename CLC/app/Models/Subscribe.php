<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'type_id'];

    public static $types = [
        1 => [
            'id' => 1,
            'name' => 'Узнать о запуске проекта'
        ],
        2 => [
            'id' => 2,
            'name' => 'Новости проекта'
        ],
        3 => [
            'id' => 3,
            'name' => 'Чек лист эффективности управления'
        ]
    ];
}
