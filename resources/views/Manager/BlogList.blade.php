@extends('Layouts.ManagerApp')
@section('content')
    <center>
        <h3>Bus Lists</h3>
        <hr>
    </center>

    @if(session('msg'))
        <div class="alert alert-primary">
            {{session('msg')}}
        </div>
    @endif

    <div class="container">
    <form method="post">
        {{csrf_field()}}
        
    <table>
        <tr>
            <td>
                <input type="text" name="search" class="form-control" placeholder="Search by Name or Location">
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="Search">
            </td>
        </tr>
    </table>
    </form>
    </div>

    <div class="container bg card">
        <table class="table">
            <tr>
                <th>Bus ID</th>
                <th>Bus Name</th>
                <th>Oparetor</th>
                <th>Location</th>
                <th>Seats</th>
                <th>Action</th>
            </tr>
        
            @foreach($busList as $bus)
                <tr>
                    <td>{{$bus['id']}}</td>
                    <td>{{$bus['name']}}</td>
                    <td>{{$bus['oparetor']}}</td>
                    <td>{{$bus['location']}}</td>
                    <td>{{$bus['seats']}}</td>
                    <td>
                        <a href="#">
                            <input type="submit" class="btn btn-primary" value="...">
                        </a>

                        <a href="#">
                            <input type="submit" class="btn btn-danger" value="X">
                        </a>
                    </td>
                </tr>
                
            @endforeach
        </table>
    </div>
@endsection
