<?php

namespace App\Http\Controllers;

use App\usersModel;
use Illuminate\Http\Request;
use App\Payment;
use Exception;
use Auth;
use Stripe\Stripe;
use App;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function orderPost(Request $request)
    {
        $user = usersModel::find(Auth::user()->id);

        $input = $request->all();

        $stripeToken = $input['stripeToken'];

        try{
            $user->newSubscription('main', 'monthly')->create($stripeToken, [
                'email' => $user->email,
            ]);

           // Stripe::setApiKey($this->app['config']['services.stripe']['key']  );
            return back()->with('success','Subscription is completed.');
        }catch(Exception $e){
            return back()->with('success',$e->getMessage());
        }
    }
}
