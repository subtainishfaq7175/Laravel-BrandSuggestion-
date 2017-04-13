@extends('layout.master')
@include('commun.sallerHeader')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2> Soled Out Product Details </h2></center> </div>

                <div class="panel-body">
                    <table class="table">
                        @foreach($products as $product)
                            <tr> <td>Product  id</td> <td>{{$product->pro_id}} </td> </tr>
                            <tr> <td>Soled to Buyer id</td> <td>{{$product->userid}} </td> </tr>
                            <tr> <td>In Amount</td> <td>{{$product->amount}} $ </td> </tr>

                        @endforeach
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@include('commun.footer')