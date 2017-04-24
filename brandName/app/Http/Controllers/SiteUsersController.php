<?php

namespace App\Http\Controllers;

use App\SiteUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class SiteUsersController extends Controller
{

    public function welcome()
    {
        return back()->with('message','You has been Login successfully!');
    }

    public function usersignup(Request $request){
        $rules = array(
            'email' => 'required | between:5,100 | email | unique:users,email',
            'password' => 'required | between:5,15',
            'name' => 'required',
            'con-pwd' => 'required|same:password',
            'role_id' => 'required'
        );


        $input = Input::get();

        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return back()->withErrors($validation);
        }

        //$input['Accout-type'];
        $input['password'] = Hash::make($input['password']);
        
        SiteUsers::create($input);
        Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')]);
        return back()->with('message','You has been signup successfully!');
    }

    public function doLogin()
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

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );


        if (Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')])){
            //return Auth::user()->accout;
            return back()->with('message','You has been Login successfully!');
         //return Auth::user();
        }
        return back()->with('err','Login Error, Please try again!');

    }


    public function userlogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
