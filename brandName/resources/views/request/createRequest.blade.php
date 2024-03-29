@extends('layout.master')
@extends('commun.buyerHeader')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add new domain request</div>

                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ implode('', $errors->all() ) }}
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(array('route'=>'adDomainRequest', 'files'=>true)) !!}
                        <div class="form-group">
                            {!! Form::label('title','Title') !!}
                            {!! Form::text('title',null , ['class'=>'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body','Description') !!}
                            {!! Form::textarea('description',null , ['class'=>'form-control' ,'required' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('file','File') !!}
                            {!! Form::file('image',null , ['class'=>'form-control'   ]) !!}
                        </div>

                        {!! Form::button('Create',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>