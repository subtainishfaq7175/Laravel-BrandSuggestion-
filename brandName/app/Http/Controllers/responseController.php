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
            if(count($saller)>0)
           {
               $respondSaller=array();
               $respondedProduct=array();
               //$respondedcomplete=array();
               foreach ($saller as $sale)
               {
                   // getting saller who are respond to request
                  /* $saller = DB::table('site_users')
                       ->where('id',$sale->sallerid)->get();
                   array_push($respondSaller,$saller );*/

                   //getting products that are going to display , that are responded by saller on request
                   $products = DB::table('products')
                       ->where('id',$sale->productid)->get();
                   array_push($respondedProduct,$products );
                   // getting complete..
                  // array_push($respondedcomplete,$products,$respondSaller );
               }
                //return $respondedProduct;

               return view('rating.index',compact( 'respondedProduct','reid'));
           } else
                return Redirect()->back();
        }
    }


    public function showResponse($rqid)
    {

        echo "Welcome";
    }
}
