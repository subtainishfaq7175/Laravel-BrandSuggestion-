<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{

    protected $table = 'buyers';

    protected $fillable = [
        'name','email','pwd','con-pwd'
    ];
}
