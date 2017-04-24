@extends('layout.master')
@include('commun.buyerHeader')
<style>
.rating {
float:left;
width:300px;
}
.rating span { float:right; position:relative; }
.rating span input {
position:absolute;
top:0px;
left:0px;
opacity:0;
}
.rating span label {
display:inline-block;
width:30px;
height:30px;
text-align:center;
color:#FFF;
background:#ccc;
font-size:30px;
margin-right:2px;
line-height:30px;
border-radius:50%;
-webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
background:#F90;
color:#FFF;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rating on response</div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success"> {{Session::get('message')}} </div>
                    @endif

                        @foreach($respondedProduct as $product)
                                @foreach($product as $product)
                                <table class="table">
                                    <tr> <th>Suggesst Doamin</th> <th></th> </tr>
                                    <tr><td>Domain Name</td> <td>{{$product->name}}</td>  </tr>
                                    <tr><td>Domain Heading</td> <td>{{$product->heading}}</td>  </tr>
                                    <tr><td>Domain sub Heading</td> <td>{{$product->subheading}}</td>  </tr>
                                    <tr><td>Domain Description</td> <td>{{$product->description}}</td>  </tr>
                                    <tr><td>Domain Price</td> <td>{{$product->price}} $</td>  </tr>
                                    <tr><td>Ratting to this response</td> <td><form action="{{route('doRating')}}" method="post">
                                                {!! Form::hidden('request_id',$reid, [
                                                    'value'                         => $reid,
                                                    'readonly'                       => 'readonly',
                                                    ]) !!}
                                                {!! Form::hidden('pro_id',$product->id, [
                                                    'value'                         => $product->id,
                                                    'readonly'                       => 'readonly',
                                                    ]) !!}
                                                {{ csrf_field()  }}
                                                <div class="rating">
                                                    <span><input type="radio" name="rate" id="str5" value="5"><label for="str5"></label></span>
                                                    <span><input type="radio" name="rate" id="str4" value="4"><label for="str4"></label></span>
                                                    <span><input type="radio" name="rate" id="str3" value="3"><label for="str3"></label></span>
                                                    <span><input type="radio" name="rate" id="str2" value="2"><label for="str2"></label></span>
                                                    <span><input type="radio" name="rate" id="str1" value="1"><label for="str1"></label></span>
                                                </div>
                                                <input type="submit" value="Rate">
                                                @if($res->rating > 0)
                                                    <i class="fa fa-check" aria-hidden="true" style="color: #2ecc71; font-size: 25px"></i>Rated
                                                @endif
                                            </form></td>  </tr>

                               <tr><td></td> <td>{{link_to_route('payments','Purchase',[$product->price, $product->id , $reid ], ['class'=>'btn btn-primary'])}}</td></tr>
                                <tr style="background-color: #00BCD4"><td></td> <td></td>  </tr>
                                </table>
                                @endforeach
                            @endforeach



                    {{--<table class="table">
                        <tr> <th>Suggest By</th> <th></th> </tr>
                        @foreach($respondSaller as $saleMan)
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
                    </table>--}}
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });


    $(document).ready(function(){
//  Check Radio-box
        $(".rating span").removeClass('checked');
        $("#str{{$res->rating}}").attr("checked", true);
        $("#str{{$res->rating}}").parent().addClass('checked');
    });
</script>
@include('commun.footer')