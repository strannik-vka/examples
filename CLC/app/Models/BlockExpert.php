<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockExpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'sort', 'published'
    ];

    public static $thumbs = [
        [500]
    ];
}
