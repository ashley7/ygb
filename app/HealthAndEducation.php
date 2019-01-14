<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthAndEducation extends Model
{
    public function subcounty()
    {
    	return $this->belongsTo('App\SubCounty','sub_county_id');
    }
}
