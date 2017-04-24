<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">


    function Validate() {
        loadLoader();
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("con-pwd").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            hideLoader();
            return false;
        }
        return true;
    }
</script>
<div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SignUp</h4>
            </div>
            <div class="modal-body">
                        <form action="{{ url('/dousersignup ') }}" method="post" onsubmit="return Validate()">
                        <input type="hidden" data-validation name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" data-validation name="name" class="form-control" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">E-mail</label>
                            <input type="email"  data-validation="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" data-validation name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confrom-password">Confrom password</label>
                            <input type="password"  data-validation="confirmation" name="con-pwd" id="con-pwd"  class="form-control"  required>
                        </div>
                        <div class="form-group" style="display: inline-block">
                            <label for="select-account">Select Account type</label> <br>
                            <input name="role_id" type="radio"  value="1"  > Seller
                            <input name="role_id" type="radio" value="2" style="margin-left: 20px"> Buyer
                        </div>

                        <div class="form-group">
                            <input  type="submit" name="submit" value="Signup" class="form-control btn btn-block btn-primary"
                                   style="padding-top: 10px;">
                        </div>


                    </form>
            </div>
        </div>

    </div>
</div>









