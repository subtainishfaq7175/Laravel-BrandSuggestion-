<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class responseController extends Controller
{

    public function index($id)
    {

       // return env('MY_GLOBAL_VAR');
        If(Auth::user()->accout == 1 )
        {
           $products = DB::table('products')
                ->where('userid', Auth::user()->id )->get() ;
            return  view('response.index', compact('products', 'id'));
        }
        return view('index');
    }

    public function store(Request $request)
    {

        $products = DB::table('products')
            ->where('userid', Auth::user()->id  && 'name',Input::get('selectpicker') )->get();

        foreach ($products as $product)
            $product->id;

        $reponse = Input::get();

        $reponse['productid'] = $product->id;
        $reponse['sallerid'] = Auth::user()->id;
        $reponse['rid'] = $reponse['id'];

       if( Response::create($reponse) )
        return Redirect()->back()->with('message','Success');
        return Redirect()->back()->withErrors();
    }
}
