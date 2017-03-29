<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Products::all();

        return view('products.index',compact('products'));

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Products::create($request->all());

        return redirect()->route('products.index')->with('message','Item has been created successfully!');

    }

    public function edit( Products $product )
    {
        return view('products.edit',compact('product'));
    }


    public function update($id, Request $request)
    {
        $item = Products::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('products.index')->with('message','Item has been Updated successfully!');
    }

    public function show(Products $product)
    {
        return view('products.show',compact('product'));
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

        $item = Products::findOrFail($id);

            $item->delete();
            return redirect()->route('products.index')->with('message','Item has been Deletd successfully!');
    }
    public function home(){
        return view('index');
    }

}