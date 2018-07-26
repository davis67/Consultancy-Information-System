<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'is_permitted','team','assigned_to','employeeNo','password'];
       
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function leaves(){

        return $this->hasMany(Leave::class);

    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function usergroup(){
        return $this->belongsTo(Usergroup::class);
    }
    /**
     * determines if a user has a given permision.
     *
     * @param array $permissions
     *
     * @return bool
     */
    public static function hasPermision($permissions)
    {
        $permision = array_get([
            'Consultant',
            'Manager',
            'Assistant Manager',
            'Director',
            'CEO',
            'Deputy Managing Director',
            'Chief Of Staffs',
            'Managing Director',
        ],auth()->user()->is_permitted, 'Intern');

        foreach ($permissions as $key => $value) {
            if ($value === $permision) {
                return true;
            }
        }

        return false;
    }
    public function opportunities(){
        return $this->belongsToMany(Opportunity::class);
    }
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
}
