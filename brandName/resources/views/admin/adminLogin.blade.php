@extends('layout.master')
{{--
@include('commun.adminHeader')--}}

<div class="container">
    <div class="col-md-3"></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ implode('', $errors->all() ) }}
            </ul>
        </div>
    @endif

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Admin Login</div>
            <div class="panel-body">
                <form action="{{ url('/adminLogin') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Email">E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Signin" class="form-control btn btn-block btn-primary"
                               style="padding-top: 10px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('commun.footer')