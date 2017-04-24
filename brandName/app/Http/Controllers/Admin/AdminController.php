<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }


}
