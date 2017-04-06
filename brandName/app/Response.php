<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'Response';

    protected $fillable = ['rid','productid','sallerid'];

    public function getProduct()
    {
        return $this->hasMany('App\Products');
    }
}
