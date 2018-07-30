<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Session;
use App\Mail\TaskMail;
class OppsTask extends Model
{
    protected $table = 'opps_tasks';
    protected $guarded = [];

    public static function serviceLines()
    {
        return [
            'Monitoring and Evaluation',
            'Recruitment Services',
            'HR Services', 'TCB Services',
            'Outsourced Financial Services',
            'ICT or MIS Services',
            'Procurement Services',
            'Public Sector Management Services',
            'IS Audits',
            'ACL',
            'Enterprise Risk Management',
            'Local Government',
            'Management consultancy',
            'Financial Advisory',
            'Pre qualification for Consultancy Services',
            'Business Development',
            'Infrastructure Consultancy',
            'Service Activities(Indirect Services)',
        ];
    }
    public static function boot(){
    	parent::boot();
    	static::creating(function($task){
            $users = User::all();
            // dd($task);
    		foreach ($users as $user) {
                # code...
    			if($user->name == $task->assigned_to && $user->team == $task->team){
    				return Task::sendMail($user->email);
    			}else{
                    Session::flash('info','opps!!!I dont know the person that you are looking for....');
                    return redirect()->back();
    			}
    		}
    		
    	});
    }

    public static function sendMail($email){

    	return  Mail::to($email)->send(new TaskMail());


    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
