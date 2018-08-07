<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;


class User extends Authenticatable
{
     use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;
	protected $dates = ['deleted_at'];
     protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'team',
        'assigned_to',
        'employee_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];

    // User Profile Setup - SHould move these to a trait or interface...

    public function profiles()
    {
        return $this->belongsToMany(App\Profile::class)->withTimestamps();
    }

    public function hasProfile($name)
    {
        foreach ($this->profiles as $profile) {
            if ($profile->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }
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
        return $this->belongsToMany(OppsTask::class);
    }

    public function projects(){
        return $this->belongsToMany(User::class);
    }
}
