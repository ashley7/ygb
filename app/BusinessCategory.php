<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $table ="businessCategory";
    const CREATED_AT = 'CreationDate';
    const UPDATED_AT = 'UpdateDate';
    protected $fillable = ["categoryName","categoryType","country","district","capital","userId","CreationDate","UpdateDate"];
}

