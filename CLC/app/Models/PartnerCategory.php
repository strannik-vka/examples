<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sort', 'published'
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'category_id')->orderBy('sort', 'asc');
    }
}
