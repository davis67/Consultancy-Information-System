<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Holiday extends Model
{
    protected $guarded=[];

    public $timestamps=false;

    public static function getDaysInLeave(Leave $leave)
    {
    	$startdate=$leave->asDate($leave->startdate);
    	$enddate=$leave->asDate($leave->enddate);
    	

    	$holidays=static::whereBetween('date', [$leave->startdate,$leave->enddate])->count();
    	
    	$weekends = $startdate->diffInDaysFiltered(function(Carbon $date) {
    	   return $date->isWeekend();
    	}, $enddate);


    	return $leave->length-$holidays-$weekends;

    }
}
