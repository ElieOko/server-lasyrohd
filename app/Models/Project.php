<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'short_desc',
        'description',
        'introduction',
        'status_project',
        'is_active'
    ];
}
