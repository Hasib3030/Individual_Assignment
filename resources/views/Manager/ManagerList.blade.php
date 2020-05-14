@extends('Layouts.ManagerApp')
@section('content')
    
    <center>
        <h3>Admin List</h3>
        <hr>
    </center>

    <div class="container bg card">
        <table class="table">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Type</th>

            @foreach($managerList as $manager)
            <tr>
                <td>
                    {{$manager['userId']}}
                </td>
                <td>
                    {{$manager['name']}}
                </td>
                <td>
                    {{$manager['email']}}
                </td>
                <td>
                    {{$manager['username']}}
                </td>
                <td>
                    {{$manager['password']}}
                </td>
                <td>
                    {{$manager['type']}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection