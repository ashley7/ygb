<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessIncomes extends Model
{
    protected $table = "incomes";
    const CREATED_AT = 'CreationDate';
    const UPDATED_AT = 'UpdateDate';
    protected $fillable = ["categoryId","memberId","userId","Amount","Reason","paymentTime","CreationDate","UpdateDate"];
}
