@extends('layout.master')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rating on response</div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success"> {{Session::get('message')}} </div>
                    @endif
                    <table class="table">
                        <tr> <th>Suggesst Doamin</th> <th></th> </tr>
                        @foreach($products as $product)
                            <tr><td>Domain Name</td> <td>{{$product->name}}</td>  </tr>
                            <tr><td>Domain Heading</td> <td>{{$product->heading}}</td>  </tr>
                            <tr><td>Domain sub Heading</td> <td>{{$product->subheading}}</td>  </tr>
                            <tr><td>Domain Description</td> <td>{{$product->description}}</td>  </tr>
                            <tr><td>Domain Price</td> <td>{{$product->price}} $</td>  </tr>
                        @endforeach
                    </table>

                    <table class="table">
                        <tr> <th>Suggest By</th> <th></th> </tr>
                        @foreach($saller as $saleMan)
                            <tr><td>Saller name</td> <td> {{$saleMan->name}} </td> </tr>
                            <tr><td>Ratting to this response</td> <td>
                                    <form action="{{route('doRating')}}" method="post">
                                        {{ csrf_field()  }}
                                        <select name="rate">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <input type="submit" value="Submit">
                                    </form>
                                </td> </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>