<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'fk_poste',
        'is_active',
        'image_public'
    ];
}
