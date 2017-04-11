<?php

namespace App;

use Laravel\Cashier\Billable;
//use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Billable;
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
}
