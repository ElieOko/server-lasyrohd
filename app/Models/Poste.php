<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    //
    protected $fillable = [
        'name',
        'is_active'
    ];
}
