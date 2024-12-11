<?php

namespace App\Models;

use App\Models\City;
use App\Models\TypeEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        "type_event_id",
        "city_id",
        "name",
        "short_desc",
        "description",
        "image_public",
        "is_active"
    ];

    public function type_event() : BelongsTo
    {
        return $this->belongsTo(TypeEvent::class,'type_event_id','id');
    }

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}
