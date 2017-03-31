<?php

namespace App\Http\Controllers;
use App\usersModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;

class usersMangeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function userindex(){
        return view('layout.test');
    }

    public function update($id)
    {
        $input = Input::get();
        $accout =  $input['accout'];
        $item = usersModel::find($id);

        if($item) {
            $item->accout = $accout;
            $item->save();
                //return Auth::user()->accout;

            return view('index')->with('message', 'Item has been loged in successfully!');

        }else return "Not found";

       // Auth::login($item);

    }
}
