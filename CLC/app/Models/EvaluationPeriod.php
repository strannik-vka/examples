<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'evaluation_stop_at'
    ];

    protected $casts = [
        'evaluation_stop_at' => 'datetime',
    ];

    public function isAccessEvaluation($user = false)
    {
        if (!$user) {
            $user = request()->user();
        }

        if ($user) {
            return !Carbon::now('Europe/Moscow')->isAfter($this->evaluation_stop_at);
        }

        return false;
    }
}
