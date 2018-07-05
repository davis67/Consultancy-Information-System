<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function opportunity()
    {
        return $this->belongsTo(App\opportunity::class);
    }
}
