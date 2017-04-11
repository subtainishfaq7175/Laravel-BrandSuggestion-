@extends('layout.master')
@include('commun.sallerHeader')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2>Product Details </h2></center> </div>

                <div class="panel-body">
                    <table class="table">
                        <tr> <td>Product Name</td> <td>{{$product->name}} </td> </tr>
                        <tr> <td>Product heading</td> <td>{{$product->heading}} </td> </tr>
                        <tr> <td>Product sub heading</td> <td>{{$product->subheading}} </td> </tr>
                        <tr> <td>Product category</td> <td>{{$product->category}} </td> </tr>
                        <tr> <td>Product price</td> <td>{{$product->price}} </td> </tr>
                        <tr> <td>Domian name</td> <td>{{$product->domain_name}} </td> </tr>
                        <tr> <td>Product Description</td> <td>{{$product->description}} </td> </tr>
                        <tr> <td>Product rating</td> <td>{{$product->rating}} </td> </tr>
                        <tr> <td>Product unit time</td> <td>{{$product->unitTime}} </td> </tr>
                        <tr> <td>Product created at</td> <td>{{$product->created_at}} </td> </tr>
                        <tr> <td>Product updated at</td> <td>{{$product->updated_at}} </td> </tr>
                    </table>
                    <td> <button class="btn-black btn-primary pull-right" > {{ link_to_route('products.index','Home') }} </button> </td>

                </div>
            </div>

        </div>
    </div>
</div>

@include('commun.footer')