<?php


namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\usersModel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function usertest()
    {
        return view('welcome');
    }

    public function usersignup(Request $request){
        $rules = array(
            'email' => 'required | between:5,100 | email ',
            'password' => 'required | between:5,15',
            'name' => 'required',
            'con-pwd' => 'required|same:password',
            'accout' => 'required'
        );


        $input = Input::get();

        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return Redirect::to('signup')->withErrors($validation);
        }

        //$input['Accout-type'];
        $input['password'] = Hash::make($input['password']);
        $input['con-pwd'] = Hash::make($input['con-pwd']);
        usersModel::create($input);
        return Redirect::to('signup')->with('message','You has been signup successfully!');
    }

    public function authenticate()
    {
        $rules = array(
            'email' => 'required | between:5,100 | email ',
            'password' => 'required | between:5,15'
        );

        $input = Input::get();
        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return Redirect::to('signup')->withErrors($validation);
        }

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );


        if (Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')])){
            echo usersModel::all()->role;
            return;
            return Redirect()->route('signup')->with('message','You has been Login successfully!');
        }
        return Redirect::to('signup')->with('err','Login Error, Please try again!');

    }

    public function userlogout()
    {
        Auth::logout();
        return Redirect::to('/signup');
    }
}
