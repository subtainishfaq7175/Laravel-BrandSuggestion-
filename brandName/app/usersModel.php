<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'name','email','pwd','con-pwd'
    ];
}
