<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'title','team','assigned_to','employeeNo','password'];
       
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
    public static function boot(){
        parent::boot();

        static::creating(function($user){
            
            $usergroups = Usergroup::all();
             dd($user);
            foreach($usergroups as $usergroup)
            if($user->title == $usergroup->name){
                dd($usergroup->id);
            }
        });
    }
    public function isPermitted(){
        $usergroups = Usergroup::all();
        foreach($usergroups as $usergroup){

        }
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
            'Managers',
            'Assistant Managers',
            'Directors',
            'CEO',
            'Deputy Managing Director',
            'Chief Of Staffs',
            'Managing Director',
        ]);

        foreach ($permissions as $key => $value) {
            if ($value === $permision) {
                return true;
            }
        }

        return false;
    }
}
