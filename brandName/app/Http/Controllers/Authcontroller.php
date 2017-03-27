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
    public function usersignup(Request $request){
        $rules = array(
            'email' => 'required | between:5,100 | email ',
            'password' => 'required | between:5,15',
            'name' => 'required',
            'con-pwd' => 'required|same:pwd'
        );

        $input = Input::get();
        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return Redirect::to('signup')->withErrors($validation);
        }

        $input['password'] = Hash::make($input['password']);
        $input['con-pwd'] = Hash::make($input['con-pwd']);
        usersModel::create($input);
        return Redirect::to('signup')->with('message','You has been signup successfully!');
    }

    public function authenticate()
    { $rules = array(
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
            'password'  => Input::get('pwd')
        );


        if (Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')])){
            return Redirect()->route('signup')->with('message','You has been signin successfully!');
        }
        return Redirect::to('signup')->with('err','Login Error, Please try again!');

    }
}
