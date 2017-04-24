<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.adminLogin');
    }

    public  function adminLogin( Request $request)
    {
        $rules = array(
            'email' => 'required | between:5,100 | email ',
            'password' => 'required | between:5,15'
        );
        $input = Input::get();
        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return back()->withErrors($validation);
        }

       if( Auth::guard('admin')->attempt(['email'=>Input::get('email'),'password'=>Input::get('password')]) )
       {
           return redirect()->intended(route('adminDashboard'));
       }

       
    }
}
