<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'url_website',
        'is_active'
    ];
}
