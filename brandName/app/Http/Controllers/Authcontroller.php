<?php


namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function usersignup(Request $request){
        $rules = array(
            'email' => 'required | between:5,100 | email ',
            'pwd' => 'required | between:5,15',
            'name' => 'required',
            'con-pwd' => 'required|same:pwd'
        );

        $input = Input::get();
        $validation = Validator($input, $rules);
        if ($validation->fails()){
            //validation fails to send response with validation errors
            // print $validator object to see each validation errors and display validation errors in your views

            return Redirect::to('/signup')->withErrors($validation);
        }

        $input['pwd'] = Hash::make($input['pwd']);
        $input['con-pwd'] = Hash::make($input['con-pwd']);
        usersModel::create($input);
        return Redirect::to('/signup')->with('message','You has been signup successfully!');
    }
}
