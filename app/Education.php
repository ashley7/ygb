<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function subcounty()
    {
    	return $this->belongsTo('App\SubCounty','sub_county_id');
    }
}
