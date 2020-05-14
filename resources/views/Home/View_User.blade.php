<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>
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
            <a class="nav-link" href="{{route('home.createUser')}}">Create User</a>
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
        <h3>View All User List</h3>
        <hr>

        @if(session('msg'))
            <div class="alert alert-info">
                {{session('msg')}}
            </div>
        @endif

        @if(session('msgDlt'))
            <div class="alert alert-danger">
                {{session('msgDlt')}}
            </div>
        @endif
    </center>
    <div class="container bg card">
        <table width="100%">
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Type</th>
            <th>Action</th>

            @for($i=0; $i< count($std); $i++)
            <tr>
                <td>{{$std[$i]['userId']}}</td>
                <td width="15%">{{$std[$i]['username']}}</td>
                <td>{{$std[$i]['password']}}</td>
                <td>{{$std[$i]['type']}}</td>
                <td>
                    <!-- <input type="submit" value="Edit" class="btn btn-info" href="/home/editUser/{{$std[$i]['sid']}}"> -->
                    <a href="/home/editUser/{{$std[$i]['userId']}}">
                        <input type="button" value="Edit" class="btn btn-info">
                    </a>
                    
                        <a href="/home/delete/{{$std[$i]['userId']}}">
                            <input type="button" value="Delete" class="btn btn-danger">
                        </a>
                </td>
            </tr>
            @endfor
        </table>
        {{$std->links()}}
    </div>
</body>
</html>