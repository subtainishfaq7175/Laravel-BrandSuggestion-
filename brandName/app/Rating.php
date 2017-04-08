<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //use Rateable;
    protected $table = 'domain_request';

    protected $fillable = [
        'title','description','remarks','userid'
    ];

}
