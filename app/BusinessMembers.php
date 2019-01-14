<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessMembers extends Model
{
    protected $table = "businessMembers";
    const CREATED_AT = 'CreationDate';
    const UPDATED_AT = 'UpdateDate';
    protected $fillable = ["categoryId","lastName","firstName","passportPhoto","IdPhoto","userId","country","district","phoneNumber","email","CreationDate","UpdateDate"];
}
