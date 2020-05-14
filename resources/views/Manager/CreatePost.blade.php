@extends('Layouts.ManagerApp')
@section('content')
    <h1>
        <center>Create New Post</center>
    </h1>
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
        <form method="post">
            {{ csrf_field() }}
            
            <input type="hidden" value="{{ session('username') }}" name="username">

            <table>
                <tr>
                    <td>Post Title </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>

                <tr>
                    <td>Post Name </td>
                    <td>
                        <input type="text" name="name">
                    </td>
                </tr>

                <tr>
                    <td>Discription </td>
                    <td>
                        <!-- <input type="text" name="discription"> -->
                        <textarea name="discription">

                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="{{ route('user.newPost') }}">
                            <input type="submit" name="btnSubmit" value="Add Post">
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection