<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{

    protected $table = 'site_users';

    protected $fillable = [
        'name','email','password', 'con-pwd','accout','provider_user_id','provider'
    ];

    public function addProduct()
    {
        return $this->hasMany('Products','userid');
    }

}
