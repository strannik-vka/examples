<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMentor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'phone', 'email'];
}
