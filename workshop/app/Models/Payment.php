<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'user_id', 'payment_product_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
