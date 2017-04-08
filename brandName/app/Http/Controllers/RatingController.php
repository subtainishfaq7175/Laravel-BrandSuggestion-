<?php

namespace App\Http\Controllers;

use App\Products;
use App\Rating;


use willvincent\Rateable\Rateable;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function doRating()
    {
        $product = Products::first();

        $ratings = Input::get();

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $ratings['rate'];
        $rating->user_id = Auth::user()->id;

        $product->ratings()->save($rating);

        //dd(Products::first()->ratings);
        return Redirect()->back()->with('message','Thanks for ratting');
    }

    public function getRating()
    {

    }


    public function index()
    {
        $requests = DB::table('domain_request')
            ->where('userid', Auth::user()->id)->get();

        if ( Auth::user()->accout == 2)

            return view('request.index',compact('requests'));

        return view('index');
    }

    public function create()
    {
        if ( Auth::user()->accout == 2)
            return view('request.createRequest');
        return view('index');
    }
    public function store(Request $request)
    {
        if ( Auth::user()->accout == 2) {
            $rules = array(
                'title' => 'required',
                'description' => 'required|min:30',
                'remarks' => 'required'
            );

            $request = Input::get();
            $validation = Validator($request, $rules);
            if ($validation->fails()){
                return Redirect()->back()->withErrors($validation);
            }
            $request['userid'] = Auth::user()->id;
            // return $product;

            Rating::create($request);
            return redirect()->route('request.index')->with('message', 'Request has been created successfully!');
        }
        return view('index');
    }

    public function edit( Rating $request )
    {
        if ( Auth::user()->accout == 2)
            return view('request.edit',compact('request'));
        return view('index');
    }
    public function update($id, Request $request)
    {
        if ( Auth::user()->accout == 2) {
            $item = Rating::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('request.index')->with('message', 'Item has been Updated successfully!');
        }
        return view('index');
    }

    public function show(Rating $request)
    {
        if ( Auth::user()->accout == 2)
            return view('request.show',compact('request'));
        return view('index');
    }

    public function destroy($id)
    {
        //$task->delete();
        if ( Auth::user()->accout == 2) {
            $item = Rating::findOrFail($id);

            $item->delete();
            return redirect()->route('request.index')->with('message', 'Item has been Deletd successfully!');
        }
        return view('index');
    }

    public function products_list()
    {

        $requests = Rating::all();
        if ( Auth::user()->accout == 1)
        return view('request.list_product',compact('requests'));
        return view('index');
    }

}
