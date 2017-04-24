<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'response';

    protected $fillable = ['rid','productid','sallerid'];

    public function getProduct()
    {
        return $this->hasMany('App\Products');
    }
}
