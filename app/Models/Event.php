<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'type_event_id',
        'city_id',
        'name',
        'short_desc',
        'description',
        'image_public',
        'is_active'
    ];
}
