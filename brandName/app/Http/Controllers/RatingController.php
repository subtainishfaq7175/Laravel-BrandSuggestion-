<?php

namespace App\Http\Controllers;

use App\Products;
use App\Rating;
use willvincent\Rateable\Rateable;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class RatingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:saller');
    }
    
    public function doRating()
    {
        $product = Products::first();

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = 5;
        $rating->user_id = 1;

        $product->ratings()->save($rating);

        dd(Products::first()->ratings);
    }

    public function getRating()
    {

    }


    public function index()
    {
        if ( Auth::user()->accout == 1)
            return view('request.index');

        return view('index');
    }

    public function store(Request $request)
    {
        if ( Auth::user()->accout == 1) {
            $rules = array(
                'title' => 'required',
                'description' => 'required|min:30',
                'remarks' => 'required'
            );

            $domainRequest = Input::get();
            $validation = Validator($domainRequest, $rules);
            if ($validation->fails()){
                return Redirect()->back()->withErrors($validation);
            }
            $domainRequest['userid'] = Auth::user()->id;
            // return $product;

            Rating::create($domainRequest);
            return redirect()->back()->with('message', 'Item has been created successfully!');
        }
        return view('index');
    }

}
