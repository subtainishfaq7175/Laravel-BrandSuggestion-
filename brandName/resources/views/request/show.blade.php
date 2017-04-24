@extends('layout.master')
@extends('commun.buyerHeader')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2>Request Details </h2></center> </div>

                <div class="panel-body">
                    <table class="table">
                        <tr><th>Title</th>
                            <th>Description</th>  </tr>


                            <tr> <td>Requset title</td> <td>{{$request->title}} </td> </tr>
                            <tr> <td>Request description</td> <td>{{$request->description}} </td> </tr>
                            <tr> <td>Request remark</td> <td>{{$request->remarks}} </td> </tr>


                    </table>
                </div>
            </div>

        </div>
    </div>
</div>