<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="{{route('home.index')}}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('home.viewUserList')}}">Create User</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('home.viewUserList')}}">View Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout.index')}}">Logout</a>
            </li>
        </ul>
    </nav>
    <br>
    <center>
        <h3>Edit User Information</h3>
        <hr>
        <!-- @if(session('msg'))
            <div class="alert alert-info">
                {{session('msg')}}
            </div>
        @endif -->
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
        <form method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" class="form-control" placeholder="Full Name" value="{{$username}}" name="uname">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="password" value="{{$password}}" class="form-control">
                </td>
            </tr>

            <tr>
                <td>Name</td>
                <td>
                    <input type="number" class="form-control" placeholder="CGPA" value="" name="cgpa">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-info" value="Update" width="100%">
                </td>
            </tr>
        </table>
        </form>
    </center>
</body>
</html>
