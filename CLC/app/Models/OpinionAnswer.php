<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpinionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_data', 'user_data', 'user_id', 'opinion_id'
    ];

    protected $casts = [
        'answer_data' => 'array',
        'user_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opinion()
    {
        return $this->belongsTo(Opinion::class);
    }
}
