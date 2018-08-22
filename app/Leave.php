<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = [];

    protected $table = 'leaves';

    protected $dates=[
        "startdate",
        "enddate"
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getLengthAttribute(){
       return $this->enddate->diffInDays($this->startdate);
    }
    public static function boot()
    {
    	static::creating(function($leave){
    		$leave->calculateDuration();
    	});
    }
    public function calculateDuration(){
    	//do your duration calculations here
    	$this->duration=Holiday::getDaysInLeave($this);
    }
}
