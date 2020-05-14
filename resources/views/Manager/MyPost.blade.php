@extends('Layouts.ManagerApp')
@section('content')
    <center>
        My Posts
    </center>
    <hr>

    <table width="100%">
        <thead>
            <th>PostID</th>
            <th>Title</th>
            <th>Name</th>
            <th>Description</th>
        </thead>

        <tbode>
            @foreach($myPost as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['name'] }}</td>
                    <td>{{ $post['discription'] }}</td>
                </tr>
            @endforeach
        </tbode>
    </table>
@endsection