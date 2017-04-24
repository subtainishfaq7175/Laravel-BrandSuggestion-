<?php

namespace App\Http\Controllers;


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
use App\Requst;
use App\Response;

class PurchasesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id , $proid , $rqid)
    {
        return view('payment.index',compact('id', 'proid', 'rqid'));
    }

    public function orderPost(Request $request)
    {
        try{
            Requst::where('id', $request->input('rqid'))->update(array('p_status' => 1 ));
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }

        //deleting Response, with this product, which is gose to soled
        try{
                Response::where('productid', $request->input('product_id'))->delete();
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }


       $user = Auth::user()->id;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $token = $request->input('stripeToken');
        try {
            $customer = \Stripe\Customer::create([
                'source' => $token,
                'email' => Auth::user()->email,
                'metadata' => [
                    "Full Name" => Auth::user()->name
                ]
            ]);

         } catch (Exception $e) {
             return back()->with('success',$e->getMessage());
         }
            $customerID = $customer->id;
            $amount = $request->input('payment');
            $amount = $amount*100;
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'customer' => $customerID,
                'metadata' => [
                    'product_name' => $request->input('product_id')
                ]
            ]);
        } catch (\Stripe\Error\Card $e) {
            return redirect()->route('order')
                ->withErrors($e->getMessage())
                ->withInput();
        }


        // creating purchases
        $products = DB::table('products')
                ->where('id',$request->input('product_id') )->get();
        try{

            Purchases::create([
                    'userid' =>  $products[0]->userid,
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
                'saller_id' =>  $products[0]->userid,
                'pro_id' => $request->input('product_id'),
                'amount' => $request->input('payment')
            ]);
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
         //adding status to domain_request k ye request product purchaes ho gei hei




        // changing the owner
        try{
            $item = Products::find($products[0]->id);

            if($item) {
                $item->userid = Auth::user()->id;

                $item->save();
                return back()->with('success','Subscription is completed.');
            }else return "Error";

        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
        // create stripe account

    }


    // shor all purchases
    public  function showAllPurchases()
    {
        $products = DB::table('products')
            ->where('userid', Auth::user()->id)->get();
        if ( Auth::user()->role_id == 2)
        {
            if( count($products)>0 )
                return view('buyerProduct.showAllProducts',compact('products'));
            else return "You do not have purchase any product..";
        }


        return view('welcome');
    }
}
