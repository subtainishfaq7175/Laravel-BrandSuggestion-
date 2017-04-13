<?php

namespace App\Http\Controllers;

use App\usersModel;
use Illuminate\Http\Request;
use App\Purchases;
use Exception;
use Auth;
use Stripe\Stripe;
use App;
use Illuminate\Support\Facades\Input;
use App\Sales;
use Illuminate\Support\Facades\DB;
use App\Products;
class PurchasesController extends Controller
{
    public function index($id , $proid)
    {
        return view('payment.index',compact('id', 'proid'));
    }

    public function orderPost(Request $request)
    {
       $user = usersModel::find(Auth::user()->id);
       $user = Auth::user()->id;
       $payment = Purchases::all();
        // creating purchases
        $products = DB::table('products')
            ->where('id',$request->input('product_id') )->get();
        try{

            Purchases::create([
                    'userid' =>  $products[0]->id,
                    'buyer_id' => $user,
                    'pro_id' => $request->input('product_id'),
                    'amount' => $request->input('payment')
            ]);
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }

        // creating sales
        try{
            Sales::create([
                'userid' => $user,
                'saller_id' =>  $products[0]->id,
                'pro_id' => $request->input('product_id'),
                'amount' => $request->input('payment')
            ]);
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
        // changing the owner
        try{
            $item = Products::find($products[0]->id);

            if($item) {
                $item->userid = Auth::user()->id;
                $item->save();
            }else return "Error";
            return back()->with('success','Subscription is completed.');
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
        // changing owner

    }


    // shor all purchases
    public  function showAllPurchases()
    {
        $products = DB::table('products')
            ->where('userid', Auth::user()->id)->get();
        if ( Auth::user()->accout == 2)
        {
            if( count($products)>0 )
                return view('buyerProduct.showAllProducts',compact('products'));
            else return "You do not have purchase any product..";
        }


        return view('index');
    }
}
