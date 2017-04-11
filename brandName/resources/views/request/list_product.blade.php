@extends('layout.master')

@include('commun.sallerHeader')

                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading"> <center> <h2>New Requests </h2></center> </div>

                                <div class="panel-body">
                                        @foreach($newRequest as $item)
                                            <table class="table">
                                                <tr><th>Title</th>
                                                    <th>Description</th>  </tr>
                                                <tr> <td>Requset title</td> <td>{{$item->title}} </td> </tr>
                                                <tr> <td>Request description</td> <td>{{$item->description}} </td> </tr>
                                                <tr> <td>Request remark</td> <td>{{$item->remarks}} </td> </tr>
                                                <tr> <td>Add by user </td> <td>{{$item->userid}} </td> </tr>
                                                <tr> <td></td> <td>{{link_to_route('doResponse','Respose',[$item->id], ['class'=>'btn btn-info pull-right'])}} </td> </tr>

                                            </table>
                                            <p style="border-bottom: 3px solid; "></p>
                                        @endforeach

                                </div>

                                <div class="panel-heading"> <center> <h2>Respond Requests </h2></center> </div>

                                <div class="panel-body">
                                    @foreach($responedRequest as $item)
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
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

@include('commun.footer')