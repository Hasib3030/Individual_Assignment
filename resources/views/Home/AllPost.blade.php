@extends('Layouts.App')
@section('content')
    <center>
        All Post List
    </center>
    <hr>

    @if(session('msgDlt'))
            <div class="alert alert-danger">
                {{session('msgDlt')}}
            </div>
        @endif
        
    <table width="100%" border="1">
        <th>Post ID</th>
        <th>Post Titile</th>
        <th>Post Name</th>
        <th>Post Description</th>
        <th>Post Action</th>

        @foreach($allPost as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['name'] }}</td>
                <td>{{ $post['discription'] }}</td>
                <td>
                    <a href='deletePost/{{$post['id']}}'>
                        <input type="submit" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection