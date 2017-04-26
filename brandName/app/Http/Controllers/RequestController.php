<?php

namespace App\Http\Controllers;

use App\Products;
use App\Requst;


use App\Response;
use App\Subscription;
use App\User;
use Mockery\Exception;
use willvincent\Rateable\Rateable;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function doRating(Request $request)
    {
        $product = Products::first();
        //$ratings = Input::get();
        try {
            // adiing ratign to respose
            DB::table('response')
                ->where('rid', $request->input('request_id'))
                ->update(['rating' => $request->input('rate')]);

        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }

        try {
            //reading avg rate form proucts table
            $proid = DB::table('products')
                ->where('id', $request->input('pro_id'))->first();
            $avg = $proid->avg_rate;
            // reading rate for update
            $cur_rate = $proid->rating;

            //update new rate
           $new_rate = ( ($cur_rate + $request->input('rate')) / $avg ) * 5;

            // adiing ratign to respose
            DB::table('products')
                ->where('id', $request->input('pro_id'))
                ->update(['rating' => $avg + 1, 'avg_rate' =>  $request->input('rate')]);
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }

        return Redirect()->back()->with('message', 'Thanks for ratting');

    }

    public function getRating()
    {

    }


    public function index()
    {

        $requests = DB::table('domain_request')
            ->where('userid', Auth::user()->id) ->orderBy('id', 'desc')->get();

        if (Auth::user()->role_id == 2)

            return view('request.index', compact('requests'));

        return view('welcome');
    }

    public function create()
    {

        if (Auth::user()->role_id == 2) {
            if (Auth::user()->subscriptions == 0) {
                return redirect()->route('/newSubscription')->with('message', 'Yor are not subscribe or your subcription is end, please subscribe first..!');
            }
            return view('request.createRequest');
        }

        return view('welcome');
    }
    //  get subscription method for those who are not subscribed or there subscription is end
    public function getSubscription(){
        return view('subscription.newSubscription');
    }
    // post subscription method for those who are not subscribed or there subscription is end
    public function postSubscription(Request $request){

        // create stripe plan
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $token =  $request->input('stripeToken');
        $amount  =  $request->input('plane') * 100;
      $plan = \Stripe\Plan::create(array(
            "name" => "Basic Plan",
            "id" => "basic-monthly",
            "interval" => "month",
            "currency" => "usd",
            "amount" => $amount,
        ));
       // create stripe customer
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
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
        // create subscriptions
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $sub = \Stripe\Subscription::create(array(
                "customer" => $customer->id,
                "plan" => "basic-monthly",
            ));

        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }
        // subsrcibed the user first in user table
        try{
            User::where('id', Auth::user()->id)->update(array('subscriptions' => 1,'sub_id' => $sub->id ));
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
        //return $sub->id;
        // create user subscriptuion record in our databases
        try{
            Subscription::create([
                't_request' =>  $request->input('plane'),
                'r_request' =>  $request->input('plane'),
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'stripe_id' => $customer->id,
                'amount' => $request->input('plane')
            ]);
            return redirect()->route('request.create')->with('message','Subscription is completed, now you can add request');
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->role_id == 2) {
            $rules = array(
                'title' => 'required',
                'description' => 'required|min:30',

            );

            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // real name but error Input::file('image'); //renameing image
                $image = Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            }

            $request = Input::get();
            $validation = Validator($request, $rules);
            if ($validation->fails()) {
                return Redirect()->back()->withErrors($validation);
            }
            $request['userid'] = Auth::user()->id;
            // return $product;
            //Deducting the request from subscriptions on each request
            try{
                $r_request = Subscription::where('user_id', Auth::user()->id)->first();
                $r_request = $r_request['r_request'] - 1;
                Subscription::where('user_id', Auth::user()->id)->update(array('r_request' => $r_request ));
                if ($r_request == 0)
                {
                    User::where('id', Auth::user()->id)->update(array('subscriptions' => 0));
                }
            }catch(Exception $e){
                return back()->with('success',$e->getMessage());
            }
            $request['image'] = $image ;
            Requst::create($request);
            return redirect()->route('request.index')->with('message', 'Request has been created successfully!');
        }
        return view('welcome');
    }

    public function edit(Requst $request)
    {
        if (Auth::user()->role_id == 2)
            return view('request.edit', compact('request'));
        return view('index');
    }

    public function update($id, Request $request)
    {
        if (Auth::user()->role_id == 2) {
            $item = Requst::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('request.index')->with('message', 'Item has been Updated successfully!');
        }
        return view('welcome');
    }

    public function show(Requst $request)
    {
        if (Auth::user()->role_id == 2)
            return view('request.show', compact('request'));
        return view('welcome');
    }

    public function destroy($id)
    {
        //$task->delete();
        if (Auth::user()->role_id == 2) {
            $item = Requst::findOrFail($id);

            $item->delete();
            return redirect()->route('request.index')->with('message', 'Item has been Deletd successfully!');
        }
        return view('welcome');
    }

    public function products_list()
    {

        if (Auth::user()->role_id == 1) {
            //  $requests = Requst::all();
            $requests = DB::table('domain_request')->where([
                ['p_status', '=', 0],
                ])
                ->orderBy('id', 'desc')  // You can pass as many columns as you required
                ->get();
             if( count($requests) == 0)
             {
                 return "There is no new request.. Please go back..";
             }
            $responedRequest = array();
            $newRequest = array();

            foreach ($requests as $request) {
                $response = DB::table('response')
                    ->where([
                        ['rid', '=', $request->id],
                        ['sallerid', '=', Auth::user()->id],
                    ])->get();
                if (count($response) > 0) {
                    array_push($responedRequest, $request);
                } else {
                    array_push($newRequest, $request);
                }
            }

            $rates = DB::table('response')->where([
                ['rating', '>', 0]])->get();
            //return count($rat);
            return view('request.list_product', compact('responedRequest', 'newRequest', 'rates'));
        }
        return view('welcome');
    }

    public function getDownload($path)
    {
        $file=$path;
        return response()->download($file);
    }
}
