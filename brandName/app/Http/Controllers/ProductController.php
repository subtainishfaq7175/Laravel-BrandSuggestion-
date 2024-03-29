<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Authcontroller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

       // $products = Products::all();
        $products = DB::table('products')
            ->where('userid', Auth::user()->id)->get();

            if ( Auth::user()->role_id == 1)
            return view('products.index',compact('products'));

            return view('welcome');
    }

    public function create()
    {
        if ( Auth::user()->role_id == 1)
            return view('products.create');

    }

    public function store(Request $request)
    {
        if ( Auth::user()->role_id == 1) {
            $rules = array(
                'name' => 'required',
                'heading' => 'required',
                'subheading' => 'required',
                'price' => 'required',
                'domain_name' => 'required',
                'description' => 'required',
                'unitTime' => 'required'
            );

            $product = Input::get();
            $validation = Validator($product, $rules);
            if ($validation->fails()){
                return Redirect::to('products/create')->withErrors($validation);
            }
            
            $product['userid'] = Auth::user()->id;
           // return $product;
            
            try{
                Products::create($product);
                return redirect()->route('products.index')->with('message', 'Item has been created successfully!');
            }catch(Exception $e){
            return back()->with('message',$e->getMessage());
        }
        
        }
        return view('welcome');
    }

    public function edit( Products $product )
    {
        if ( Auth::user()->role_id == 1)
            return view('products.edit',compact('product'));
        return view('welcome');
    }


    public function update($id, Request $request)
    {
        if ( Auth::user()->role_id == 1) {
            $item = Products::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('products.index')->with('message', 'Item has been Updated successfully!');
        }
        return view('welcome');
    }

    public function show(Products $product)
    {
        if ( Auth::user()->role_id == 1)
            return view('products.show',compact('product'));
        return view('welcome');
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
        if ( Auth::user()->role_id == 1) {
            $item = Products::findOrFail($id);

            $item->delete();
            return redirect()->route('products.index')->with('message', 'Item has been Deletd successfully!');
        }
        return view('welcome');
    }

}