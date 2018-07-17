<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = [];
    protected $table = 'leaves';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
