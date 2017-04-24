@extends('layout.master')
@include('commun.sallerHeader')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2> Soled Out Product Details </h2></center> </div>
                @foreach($products as $product)
                    <div class="panel-body">
                        <table class="table">
                                <tr> <td>Product  id</td> <td>{{$product->pro_id}} </td> </tr>
                                <tr> <td>Soled to Buyer id</td> <td>{{$product->userid}} </td> </tr>
                                <tr> <td>In Amount</td> <td>{{$product->amount}} $ </td> </tr>
                        </table>
                    </div>
                    <p style="border: 2px solid; border-color: #2ecc71"></p>
                @endforeach
            </div>

        </div>
    </div>
</div>
@include('commun.footer')