@extends('layout.master')
@include('commun.sallerHeader')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{Session::get('message')}} </div>
            @endif
            <div class="panel panel-default">
                @if(count($products)>0)
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Product ID</th>
                            <th>Heading</th>
                            <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>  {{ $product->id }} </td>
                                <td>  {{ link_to_route('products.show',$product->name,[$product->id]) }} </td>
                                <td>
                                    {!! Form::open(array('route'=>['products.destroy',$product->id], 'method'=>'DELETE')) !!}
                                    {{link_to_route('products.edit','Edit',[$product->id], ['class'=>'btn btn-primary'])}}

                                    |
                                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
            @else <p>You donot have any name,, for create new name click blow button ...  </p>
        </div>
        @endif
        {{link_to_route('products.create','Add new Name',null, ['class'=>'btn btn-success'])}}
    </div>
</div>

@include('commun.footer')