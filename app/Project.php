<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
    public function associate(){

        return $this->hasMany(Associate::class);
        
    }
    public function tasks(){

        return $this->belongsToMany(Task::class);
        
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
