<?php

namespace App;

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
    protected $fillable = [
        'name', 'email', 'password',
    ];

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
        return $this->hasOne('App\Profile');
    }

    public function activities()
    {
        return $this->hasMany(App\Activity::class);
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
        ], auth()->user()->is_permitted, 'Intern');

        foreach ($permissions as $key => $value) {
            if ($value === $permision) {
                return true;
            }
        }

        return false;
    }
}
