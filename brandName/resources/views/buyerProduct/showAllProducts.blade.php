@extends('layout.master')
@include('commun.buyerHeader')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2> Purchased Product Details </h2></center> </div>
                @foreach($products as $product)
                <div class="panel-body">
                    <table class="table">

                            <tr> <td>Product Name</td> <td>{{$product->name}} </td> </tr>
                            <tr> <td>Product heading</td> <td>{{$product->heading}} </td> </tr>
                            <tr> <td>Product sub heading</td> <td>{{$product->subheading}} </td> </tr>
                            <tr> <td>Product category</td> <td>{{$product->category}} </td> </tr>
                            <tr> <td>Product price</td> <td>{{$product->price}} $ </td> </tr>
                            <tr> <td>Domian name</td> <td>{{$product->domain_name}} </td> </tr>
                            <tr> <td>Product Description</td> <td>{{$product->description}} </td> </tr>
                            <tr> <td>Product rating</td> <td>{{$product->rating}} </td> </tr>
                            <tr> <td>Product unit time</td> <td>{{$product->unitTime}} </td> </tr>

                    </table>

                </div>
                    <p style="border: 2px solid; border-color: #2ecc71"></p>
                @endforeach
            </div>

        </div>
    </div>
</div>
@include('commun.footer')