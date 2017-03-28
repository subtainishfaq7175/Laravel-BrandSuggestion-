<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">

                    <form action="{{ url('/userLogin') }}" method="post">
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
                            <input type="submit" name="submit" value="Signin" class="form-control btn btn-block btn-primary">
                            <a href="redirect">FB Login</a>
                            <p class="pull-right">
                                <a class="" href="javascript:;" data-toggle="modal" data-target="#forget-password">Forget password</a>
                            </p>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">

                <button class="btn btn-primary btn-block"> <a class="" href="javascript:;" data-toggle="modal" data-target="#signupModal"> Signup</a></button>
            </div>
        </div>

    </div>
</div>






