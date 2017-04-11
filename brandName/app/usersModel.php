<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class usersModel extends Model
{
    use Billable;
    protected $table = 'site_users';

    protected $fillable = [
        'name','email','password', 'con-pwd','accout'
    ];


    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    public function addProduct()
    {
        return $this->hasMany('Products','userid');
    }

}
