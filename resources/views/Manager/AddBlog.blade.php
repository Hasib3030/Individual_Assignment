@extends('Layouts.ManagerApp')
@section('content')
    <center>
        <h3>Add New Bus</h3>
        <hr>
    </center>

    <div class="container bg card">
        <form method="post">
        
        <!-- print Error -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('msg'))
            <div class="alert alert-primary">
                {{session('msg')}}
            </div>
        @endif
        {{csrf_field()}}
        <table width="70%">
            <tr>
                <td>
                    <input type="text" name="name" placeholder="Bus Name" class="form-control"> 
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="oparetor" placeholder="Oparetor Name" class="form-control">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="location" placeholder="Location" class="form-control">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="seats" placeholder="Seats" class="form-control">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit"  value="Save" class="btn btn-primary">
                </td>
            </tr>
        </table>
        </form>
    </div>
@endsection