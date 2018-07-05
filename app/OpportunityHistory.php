<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class OpportunityHistory extends Model

{
	

    protected $table = 'opportunity_histories';

     
    protected $guarded = [];

    public static function boot(){

    	parent::boot();

    	foreach(["created", "updated", "deleted"] as $event){

			static::$event(function($opportunity) use($event){

				self::create([
					"opportunity_id" => opportunity()->id,
					"action" => $event,
					"date" => Carbon::now()
				]);

			});
		}
    }
    public function opportunity(){

    	return $this->belongsTo(App\Opportunity::class);
    }
}
