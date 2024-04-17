<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'juridical_status',
        'activity_spheres', 'website', 'fio',
        'birthday', 'email', 'phone', 'social_network',
        'region', 'city', 'about_team', 'motivation',
        'portfolio', 'video', 'source',
        'mission', 'social', 'economic', 'levels_media'
    ];

    protected $casts = [
        'activity_spheres' => 'array',
        'birthday' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'id', 'project_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'project_id');
    }
}
