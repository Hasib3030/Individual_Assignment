@extends('Layouts.App')
@section('content')

    <center>
        <h3>Add New Bus Counters</h3>
    </center>
    <hr>

    <div class="container bg card">

        <!-- Show All Error Here -->

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
            {{ @csrf_field() }}
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" class="form-control" name="name">
                </td>
            </tr>

            <tr>
                <td>Oparetor</td>
                <td>
                    <input type="text" class="form-control" name="oparetor">
                </td>
            </tr>

            <tr>
                <td>Manager</td>
                <td>
                    <input type="text" class="form-control" name="manager">
                </td>
            </tr>

            <tr>
                <td>Location</td>
                <td>
                    <input type="text" class="form-control" name="location">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <center>
                        <a href="{{ route('home.addbuscounter') }}">
                            <input type="submit" class="btn btn-success" value="Save">
                        </a>
                    </center>
                </td>
            </tr>
        </table>
        </form>
    </div>

@endsection