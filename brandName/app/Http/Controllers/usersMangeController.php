<?php

namespace App\Http\Controllers;
use App\usersModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;

class usersMangeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function userindex(){
        return view('layout.test');
    }

    public function update($id)
    {
        $input = Input::get();
        $accout =  $input['role_id'];
        $item = usersModel::find($id);

        if($item) {
            $item->accout = $accout;
            $item->save();
                //return Auth::user()->accout;

            return view('welcome')->with('message', 'Item has been loged in successfully!');

        }else return "Not found";

       // Auth::login($item);

    }
}
