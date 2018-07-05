<?php
namespace App\traits;
use App\Activity;
use App\User;
use Illuminate\Support\Carbon;
trait RecordsActivity{



	protected static function boot(){
		foreach (["created", "updated", "deleted"] as $event) {
			static::$event(function($model) use ($event){
			$model->recordActivity($event);
		});
        }
    }
		
	protected function recordActivity($event){
		//send message if neccessary
		Activity::create([
			'user_id' => auth()->id(),
			'type' => $this->getType($event),
			'date' => Carbon::now()
		]);
	}

	protected function getType($event){

		$type = strtolower((new \ReflectionClass($this))->getShortName());
		return "{$event}_{$type}";
	}

	}