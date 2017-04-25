<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requst extends Model
{
    //use Rateable;
    protected $table = 'domain_request';

    protected $fillable = [
        'title','description','userid','p_status','image'
    ];
}
