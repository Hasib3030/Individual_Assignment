<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
</head>
<body>
    <div class="container bg card">
        <center>
            <h4>Create New Account</h4>
        </center>
        <hr>

        <!-- Error Message -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
        <center>
        <form method="POST">
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>Full Name :</td>
                <td>
                    <input type="text" class="form-control" name="name"> 
                </td>
            </tr>

            <tr>
                <td>Email :</td>
                <td>
                    <input type="text" class="form-control" name="email"> 
                </td>
            </tr>

            <tr>
                <td>UserName :</td>
                <td>
                    <input type="text" class="form-control" name="username"> 
                </td>
            </tr>

            <tr>
                <td>Password :</td>
                <td>
                    <input type="text" class="form-control" name="password"> 
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <a href="{{ route('CreateAccount') }}">
                    <input type="submit" class="btn btn-warning" name="btnSave" value="Create Account">
                    </a> 
                </td>
            </tr>
        </table>
        </form>
        </center>
    </div>
</body>
</html>