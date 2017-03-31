<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Authcontroller;
use App\Products;
use Illuminate\Http\Request;

use Auth;

class ProductController extends Controller
{
    public function index()
    {

        $products = Products::all();

            if ( Auth::user()->accout == 1)
            return view('products.index',compact('products'));

            return view('index');
    }

    public function create()
    {
        if ( Auth::user()->accout == 1)
            return view('products.create');
        return view('index');
    }

    public function store(Request $request)
    {
        if ( Auth::user()->accout == 1) {
            Products::create($request->all());
            return redirect()->route('products.index')->with('message', 'Item has been created successfully!');
        }
        return view('index');
    }

    public function edit( Products $product )
    {
        if ( Auth::user()->accout == 1)
            return view('products.edit',compact('product'));
        return view('index');
    }


    public function update($id, Request $request)
    {
        if ( Auth::user()->accout == 1) {
            $item = Products::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('products.index')->with('message', 'Item has been Updated successfully!');
        }
        return view('index');
    }

    public function show(Products $product)
    {
        if ( Auth::user()->accout == 1)
            return view('products.show',compact('product'));
        return view('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$task->delete();
        if ( Auth::user()->accout == 1) {
            $item = Products::findOrFail($id);

            $item->delete();
            return redirect()->route('products.index')->with('message', 'Item has been Deletd successfully!');
        }
        return view('index');
    }

}