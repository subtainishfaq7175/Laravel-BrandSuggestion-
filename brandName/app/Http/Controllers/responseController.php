<?php

namespace App\Http\Controllers;

use App\Requst;
use Illuminate\Http\Request;
use Auth;
use App\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class responseController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {

        If(Auth::user()->role_id == 1 )
        {

            // not responded view
           $products = DB::table('products')
                ->where('userid', Auth::user()->id )->get();
            return  view('response.index', compact('products', 'id'));
        }
        return view('welcome');
    }

    public function store(Request $request)
    {
        $rules = array(
            'selectpicker' => 'required'
        );

        $input = Input::get();
        $validation = Validator($input, $rules);
        if ($validation->fails()){
            return back()->withErrors($validation);
        }
       // return Input::get('selectpicker');
        $product = DB::table('products')
            ->where( 'id', Input::get('selectpicker') )->first();

        $reponse = Input::get();

        $reponse['productid'] = $product->id;
        $reponse['sallerid'] = Auth::user()->id;
        $reponse['rid'] = $reponse['id'];

       if( Response::create($reponse) )
       {
           //updating singlw colom of status in "domqin_request" table
           Requst::where('id', $reponse['id'])->update(array('status' => 1 ));
           return redirect()->route('products_list')->with('message','Success');
       }


        return Redirect()->back()->withErrors();
    }

    public function show($reid)
    {
        if ( Auth::user()->role_id == 2)
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
                   $products = DB::table('products')
                       ->where('id',$sale->productid)->get();
                   array_push($respondedProduct,$products );
               }
                //return $respondedProduct;
               $res = DB::table('response')
                   ->where('rid', $reid )->first();

               return view('rating.index',compact( 'respondedProduct','reid' , 'res'));
           } else
                return Redirect()->back()->with('message','Sorry, No Response against this request');
        }
    }


    public function showResponse($rqid)
    {

        echo "Welcome";
    }
}
