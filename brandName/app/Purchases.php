<?php

namespace App;

use Laravel\Cashier\Billable;
//use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Database\Eloquent\Model;


class Purchases extends Model
{
    //use Billable;

    protected $fillable = ['userid','pro_id','amount','buyer_id'];
}
