<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function names()
    {
        return ['TSS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'];
    }
}
