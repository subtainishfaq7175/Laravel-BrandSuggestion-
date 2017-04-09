<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Auth;
use App\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class responseController extends Controller
{

    public function index($id)
    {

        If(Auth::user()->accout == 1 )
        {

            // not responded view
           $products = DB::table('products')
                ->where('userid', Auth::user()->id )->get();
            return  view('response.index', compact('products', 'id'));
        }
        return view('index');
    }

    public function store(Request $request)
    {
       // return Input::get('selectpicker');
        $products = DB::table('products')
            ->where( 'id', Input::get('selectpicker') )->get();
       //return  Input::get('selectpicker');
        //return Auth::user()->id;
      // return $products;
       foreach ($products as $product)

        $reponse = Input::get();

        $reponse['productid'] = $product->id;
        $reponse['sallerid'] = Auth::user()->id;
        $reponse['rid'] = $reponse['id'];

       if( Response::create($reponse) )
       {
           //updating singlw colom of status in "domqin_request" table
           Rating::where('id', $reponse['id'])->update(array('status' => 1 ));
           return Redirect()->back()->with('message','Success');
       }


        return Redirect()->back()->withErrors();
    }

    public function show($reid)
    {
        if ( Auth::user()->accout == 2)
        {

            // getting saller id from response table  if responed other wise error
            $saller = DB::table('response')
                ->where('rid',$reid)->get();
           if($saller)
           {
               foreach ($saller as $sale)
                   //geting saller form site_users table
               $sallerid = $sale->sallerid;
               $saller = DB::table('site_users')
                   ->where('id',$sallerid)->get();
               //getting product from products table against upper got saller id
               $products = DB::table('products')
                   ->where('userid',$sallerid)->get();
               //passing
                return view('rating.index',compact('products', 'saller'));
           } else
                return Redirect()->back();
        }
    }


    public function showResponse($rqid)
    {

        echo "Welcome";
    }
}
