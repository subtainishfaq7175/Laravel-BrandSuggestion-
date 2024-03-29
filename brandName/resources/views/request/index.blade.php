@extends('layout.master')
@include('commun.buyerHeader')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{Session::get('message')}} </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Request ID</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        @foreach($requests as $request)
                            <tr>
                                <td>  {{ $request->id }} </td>
                                <td>  {{ link_to_route('request.show',$request->title,[$request->id]) }} </td>
                                <td>
                                    {!! Form::open(array('route'=>['request.destroy',$request->id], 'method'=>'DELETE')) !!}
                                    {{link_to_route('request.edit','Edit',[$request->id], ['class'=>'btn btn-primary'])}}

                                    |
                                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!} |
                                    @if($request->p_status == 1)
                                        {!! Form::button('Purchased',['class'=>'btn btn-info']) !!}
                                    @else
                                        {{link_to_route('showResponse','Show response',[$request->id], ['class'=>'btn btn-primary'])}}
                                    @endif
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
            {{link_to_route('request.create','Add new request',null, ['class'=>'btn btn-success'])}}

        </div>
    </div>
</div>

@include('commun.footer')