@extends('layout.master')
<body id="page-top">

<div class="body">
    <!-- HEADER -->
@include('commun.accountHeader')
<br>
<br>
<br>

<div class="row">
    <div class="col-md-3 col-sm-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">Please Select Your account type</div>
                <div class="panel-body">
                    <div class="form-group" style="display: inline-block">
                        <form action="{{ url('/socialSignin ') }}" method="post" >
                            <input type="hidden" data-validation name="_token" value="{{ csrf_token() }}">
                            <label for="select-account">Select Account type</label> <br>
                            <input name="role_id" checked="checked" type="radio"  value="1"  > Seller
                            <input name="role_id" type="radio" value="2" style="margin-left: 20px"> Buyer
                            <div class="form-group" style="margin-top: 20px;">
                                <input  type="submit" name="submit" value="Submit" class="form-control btn btn-block btn-primary"
                                        style="padding-top: 10px;">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

    @include('commun.footer')
    @include('layout.user-login')
    @include('layout.user-signup')
    @include('layout.forget-password')
    @include('layout.logout')


</div>
