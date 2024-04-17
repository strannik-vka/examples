<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'sort', 'published', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(PartnerCategory::class, 'category_id');
    }
}
