<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_history extends Model
{
    protected $guarded = [];

    public function opportunity(){
        return $this->belongsTo(Opportunity::class);
    }
    public function activity(){
        return $this->belongsTo(Activity::class);
    }
}
