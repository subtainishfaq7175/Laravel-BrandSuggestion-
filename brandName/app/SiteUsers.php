<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteUsers extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name','email','password','role_id'
    ];

}
