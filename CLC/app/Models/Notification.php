<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_read', 'user_id', 'type_id', 'notificateable_id', 'notificateable_type'
    ];

    public function notificateable(): MorphTo
    {
        return $this->morphTo();
    }
}
