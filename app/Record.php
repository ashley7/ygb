<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function parish($value='')
    {
    	return $this->belongsTo('App\Parish');
    }
}
