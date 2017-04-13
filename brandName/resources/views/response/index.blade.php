@extends('layout.master')
@include('commun.sallerHeader')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{Session::get('message')}} </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading"> <center> <h2>Respond to request </h2></center> </div>

                <div class="panel-body">
                    <table class="table">
                        <th>Selection</th>
                        <th>Action</th>
                        {!! Form::open(array('route'=>'respond')) !!}
                        <tr><td>Select domian to respond
                                <select class="selectpicker" name="selectpicker">
                                    <option></option>
                                    @foreach ($products as $pro )
                                        <option value="{{$pro->id}}">{{$pro->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <input type="hidden" name="id" value="{{$id}}">
                            <td>{!! Form::button('Submit',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@include('commun.footer')