<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackProject extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'project_id'
    ];
}
