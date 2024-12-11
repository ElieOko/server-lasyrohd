<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class TypeEvent extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
    ];  
    
    public function event() : HasMany
    {
        return $this->hasMany(Event::class);
    }
}

