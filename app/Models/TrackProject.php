<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class TrackProject extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'project_id'
    ];

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
