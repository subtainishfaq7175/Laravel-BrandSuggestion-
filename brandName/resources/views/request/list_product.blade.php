@extends('layout.master')
@include('commun.sallerHeader')
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @if(Session::has('message'))
                                <div class="alert alert-success"> {{Session::get('message')}} </div>
                            @endif
                            <div class="panel panel-default">
                                @foreach($newRequest as $item)
                                    <div class="panel-heading"> <center> <h2>New Requests </h2></center> </div>

                                    <div class="panel-body">
                                        <table class="table">
                                            <tr><th>Title</th>
                                                <th>Description</th>  </tr>
                                            <tr> <td>Requset title</td> <td>{{$item->title}} </td> </tr>
                                            <tr> <td>Request description</td> <td>{{$item->description}} </td> </tr>

                                            <tr> <td>Add by user </td> <td>{{$item->userid}} </td> </tr>
                                            <tr> <td></td> <td>{{link_to_route('doResponse','Respose',[$item->id], ['class'=>'btn btn-info pull-right'])}} </td> </tr>
                                        </table>
                                        <p style="border-bottom: 3px solid; "></p>
                                    </div>
                                @endforeach
                                <?php $c = 0; $t = count($rates)  ?>
                                @foreach($responedRequest as $item)
                                    <div class="panel-heading"> <center> <h2>Respond Requests </h2>
                                        @if( $c < $t )
                                            <i class="fa fa-check" aria-hidden="true" style="color: #2ecc71; font-size: 25px"></i>Rated

                                            <p style="float: right">Rating {{$rates[$c]->rating}} / 5</p>
                                             <?php $c++ ?>
                                        @endif
                                        </center> </div>

                                    <div class="panel-body">

                                            <table class="table">
                                                <tr><th>Title</th>
                                                    <th>Description</th>  </tr>
                                                <tr> <td>Requset title</td> <td>{{$item->title}} </td> </tr>
                                                <tr> <td>Request description</td> <td>{{$item->description}} </td> </tr>
                                                <tr> <td>Request remark</td> <td>{{$item->remarks}} </td> </tr>
                                                <tr> <td>Add by user </td> <td>{{$item->userid}} </td> </tr>
                                                <tr> <td></td> <td>{{link_to_route('Response','Show Respose',[$item->id], ['class'=>'btn btn-info pull-right'])}} </td> </tr>

                                            </table>
                                            <p style="border-bottom: 3px solid; "></p>
                                    </div>
                                 @endforeach

                            </div>

                        </div>
                    </div>
                </div>

@include('commun.footer')