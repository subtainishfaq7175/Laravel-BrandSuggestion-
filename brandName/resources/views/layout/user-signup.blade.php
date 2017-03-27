<div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ url('/signup') }}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">E-mail</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="con-pwd">Confrom password</label>
                            <input type="password" name="con-pwd" class="form-control" required>
                        </div>
                        <div class="form-group">

                            <input type="submit" name="submit" value="Signup" class="form-control btn btn-block btn-primary">
                        </div>


                    </form>
            </div>
        </div>

    </div>
</div>






