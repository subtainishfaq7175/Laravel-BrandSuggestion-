<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
   // use Billable;

    protected  $table = 'subscriptions';

    protected $fillable = ['user_id','name','stripe_id', 't_request','r_request'];
}
