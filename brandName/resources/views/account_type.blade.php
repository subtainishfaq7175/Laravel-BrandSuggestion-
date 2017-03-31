@extends('layout.master')

{!! Form::open(array('url' => ['users', $users->id], 'method' => 'PUT') )  !!}

<div class="form-group">
    <h4>Select Account type</h4>
    <input name="accout" type="radio" value="1">Saller
    <input name="accout" type="radio" value="2">Buyer

</div>
<div class="form-group">
    {!! Form::hidden('email',null , ['class'=>'form-control','required','readonly'])!!}

</div>
<div class="form-group">
    {!! Form::hidden('password',null , ['class'=>'form-control','readonly'])!!}
</div>
<div class="form-group">

    {!! Form::button('Update',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}






