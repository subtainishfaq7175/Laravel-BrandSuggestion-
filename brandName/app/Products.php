<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Products extends Model
{

    use Rateable;

    protected $table = 'products';

    protected $fillable = [
        'name','heading','subheading', 'category','price','domain_name','description','unitTime','userid'
    ];

    public function getUser()
    {
        return $this->belongsTo(usersModel::class);
    }

}
