<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersMangeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function userindex(){
        return view('layout.test');
    }
}
