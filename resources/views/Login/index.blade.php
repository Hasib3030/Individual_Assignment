<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <br><br><br>

    <form method="POST">
        <div class="container bg card">
            <center>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
                <h2>User Login</h2>
                <hr>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" placeholder="Username" name="username"><br><br>
                <input type="password" placeholder="Password" name="password"><br><br>

                <h4>{{session('msg')}}</h4>

                <input type="submit" name="login" value="Login" <br>
                <br><a href="{{ route('CreateAccount') }}">Create New Account</a>
            </center>
        </div>
    </form>
</body>
</html>
