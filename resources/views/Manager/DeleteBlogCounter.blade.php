@extends('Layouts.ManagerApp')
@section('content')
    <center>
        <h2>Delete Bus Counter Information</h2>
        <hr>
    </center>

    <div class="container bg card">

        <!-- <form method="post"> -->
            <!-- {{ csrf_field() }} -->
        <table class="table table-hover">
            <tr>
                <td>ID</td>
                <td>
                    {{ $busCounter['id'] }}
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    {{$busCounter['name']}}
                </td>
            </tr>

            <tr>
                <td>Oparetor</td>
                <td>
                    {{ $busCounter['oparetor'] }}
                </td>
            </tr>

            <tr>
                <td>Manager</td>
                <td>
                    {{ $busCounter['manager'] }}
                </td>
            </tr>

            <tr>
                <td>Location</td>
                <td>
                    {{ $busCounter['location'] }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong> Are You Sure To Delete This Data? </strong>
                </td>
                <td>
                    <center>
                            <a href="/manager/removeBusCounter/{{ $busCounter['id'] }}">
                                <input type="submit" class="btn btn-danger" value="Yes">
                            </a>

                            <!-- if No.Go back To Blog Counter List Page -->
                            <a href="{{route('manager.buscounter')}}">
                                <input type="submit" class="btn btn-secondary" value="No">
                            </a>
                    </center>
                </td>
            </tr>
        </table>
    </div>
@endsection
