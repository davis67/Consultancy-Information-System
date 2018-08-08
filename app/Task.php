<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	
	protected $fillable = [ 
    	'project_id','user_id', 'task_title', 'task' , 'priority', 'duedate'
     ] ;
	
	public function project(){

        return $this->belongsTo(Project::class);
        
	}

	public function subtasks(){
		return $this->hasMany(App\Subtask::class);
	}
	
}