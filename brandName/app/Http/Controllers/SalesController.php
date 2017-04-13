<?php

namespace App\Http\Controllers;
use App\Sales;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function showAllSales()
    {
        $products = DB::table('sales')
            ->where('saller_id', Auth::user()->id)->get();
        if ( Auth::user()->accout == 1)
        {
            if( count($products)>0 )
                return view('soledProducts.showAllsales',compact('products'));
            else return "You do not have soled any product..";
        }


        return view('index');
    }
}
