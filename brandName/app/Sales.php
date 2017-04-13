<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['userid','pro_id','amount', 'saller_id'];
}
