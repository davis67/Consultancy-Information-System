<?php

namespace App;

use App\traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;
use DB;

class Opportunity extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function latestOmnumber()
    {
        $last = DB::table('opportunities')->latest('id')->first();

        if (null == $last) {
            $latest = 8790;
        } else {
            $latest = $last->OM_number;
        }

        return $latest;
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function opportunityHistory()
    {
        return $this->hasMany(OpportunityHistory::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
