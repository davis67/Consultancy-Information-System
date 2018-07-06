<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function opportunity()
    {
        return $this->belongsTo(App\Opportunity::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->opportunity_id = opportunity()->id();
            dd($project);
        });
    }
}
