<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessExpenditures extends Model
{
    protected $table =  "expenditures";
    const CREATED_AT = 'CreationDate';
    const UPDATED_AT = 'UpdateDate';
    protected $fillable = ["categoryId","memberId","userId","Amount","Reason","paymentTime","CreationDate","UpdateTime"];
}
