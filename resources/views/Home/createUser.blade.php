@extends('Layouts.App')
@section('content')

    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif

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
        <h3>Create New User</h3>
        <hr>
        <form method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <table>
            <tr>
                <td>
                    <input type="text" class="form-control" placeholder="Full Name" name="name">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="password" placeholder="Password" name="password" class="form-control">
                </td>
            </tr>

            <tr>
                <td>
                    <select class="form-control" name="type">
                        <option disabled>User Type</option>
                        <option>Admin</option>
                        <option>Manager</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" class="btn btn-success" value="Register" >
                </td>
            </tr>

        </table>
        </form>
    </center>
@endsection