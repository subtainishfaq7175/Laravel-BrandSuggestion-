<!DOCTYPE html>
<html lang="en">
<head>
    <title>User|Buyers Login| SignUp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>





    <div class="container">
        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    {{ implode('', $errors->all() ) }}
                </ul>
            </div>

        @endif
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('message'))
                    <div class="alert alert-success"> {{Session::get('message')}} </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="text-center">SignUp</h3></div>
                    <div class="panel-body">
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
                                <input type="password" name="pwd" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="con-pwd">Confrom password</label>
                                <input type="password" name="con-pwd" class="form-control" required>
                            </div>
                            <div class="form-group">

                                <input type="submit" name="submit" value="Submit" class="form-control btn btn-block btn-primary" required>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="text-center">SignIn</h3></div>
                    <div class="panel-body">
                        <form action="{{ url('/signup') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="Email">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pwd" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="con-pwd">Confrom password</label>
                                <input type="password" name="con-pwd" class="form-control" required>
                            </div>
                            <div class="form-group">

                                <input type="submit" name="submit" value="Submit" class="form-control btn btn-block btn-primary" required>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>



</body>
</html>
