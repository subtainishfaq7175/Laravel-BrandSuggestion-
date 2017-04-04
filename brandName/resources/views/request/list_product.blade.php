@extends('layout.master')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2>New Request Details </h2></center> </div>

                <div class="panel-body">
                    <table class="table">
                    <tr><th>Title</th>
                    <th>Description</th>  </tr>

                        @foreach($requests as $request)
                        <tr> <td>Requset title</td> <td>{{$request->title}} </td> </tr>
                        <tr> <td>Request description</td> <td>{{$request->description}} </td> </tr>
                        <tr> <td>Request remark</td> <td>{{$request->remarks}} </td> </tr>
                        <tr> <td>Add by user </td> <td>{{$request->userid}} </td> </tr>
                     @endforeach
                    </table>
                    <td> <button class="btn-black btn-primary pull-right" > {{ link_to_route('signup','Home') }} </button> </td>

                </div>
            </div>

        </div>
    </div>
</div>