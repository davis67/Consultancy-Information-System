<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $appends = ["open"];

	public function getOpenAttribute(){
		return true;
	}
	public function project(){

        return $this->belongsTo(Project::class);
        
    }
}