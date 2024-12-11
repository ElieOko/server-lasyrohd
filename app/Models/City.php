<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function event() : HasMany
    {
        return $this->hasMany(Event::class);
    }
}
