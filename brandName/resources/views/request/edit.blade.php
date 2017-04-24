@extends('layout.master')
@extends('commun.buyerHeader')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Request</div>

                <div class="panel-body">
                    {!! Form::model($request, array('route'=>['request.update',$request->id], 'method'=>'PUT')) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title',null , ['class'=>'form-control','required'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body','Description') !!}
                        {!! Form::textarea('description',null , ['class'=>'form-control','required']) !!}
                    </div>


                    <div class="form-group">

                        {!! Form::button('Update',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>
</div>