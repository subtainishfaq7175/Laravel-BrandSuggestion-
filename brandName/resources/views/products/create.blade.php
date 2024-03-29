@extends('layout.master')
@include('commun.sallerHeader')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Domain</div>

                <div class="panel-body">
                    
                    @if(Session::has('message'))
                        <div class="alert alert-success"> {{Session::get('message')}} </div>
                    @endif
                    
                    {!! Form::open(array('route'=>'products.store')) !!}
                    <div class="form-group">
                        {!! Form::label('title','Name') !!}
                        {!! Form::text('name',null , ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body','Heading') !!}
                        {!! Form::text('heading',null , ['class'=>'form-control' ,'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('deadline','Sub heading') !!}
                        {!! Form::text('subheading',null , ['class'=>'form-control' ,'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('riminder','Category') !!}
                        {!! Form::text('category',null , ['class'=>'form-control' ,'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('r_mesg','Price') !!}
                        {!! Form::number('price',null , ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status','Domain name') !!}
                        {!! Form::text('domain_name',null , ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status','Description') !!}
                        {!! Form::text('description',null , ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status','Unit Time') !!}
                        {!! Form::text('unitTime',null , ['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group">

                        {!! Form::button('Create',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>

@include('commun.footer')