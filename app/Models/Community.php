<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'is_active'
    ];
}
