<?php

namespace App\Models;

use App\Models\TrackProject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function track_project() : HasMany
    {
        return $this->hasMany(TrackProject::class);
    }
}
