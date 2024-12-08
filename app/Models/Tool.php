<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'url_website',
        'logo',
        'is_active'
    ];
}
