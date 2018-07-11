<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
