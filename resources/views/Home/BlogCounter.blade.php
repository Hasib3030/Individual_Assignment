@extends('Layouts.App')
@section('content')
    <center>
        <h3>Bus Counter List</h3>
        <a href="{{ route('home.addbuscounter') }}">
            <input type="submit" class="btn btn-success" value="Add New Bus Counter">
        </a>
        <hr>
    
        <input id="token" name="_token" type="hidden" value="{{csrf_token()}}">

        @if(session('msg'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
        @endif
        <div class="container">
            <center>
                <input type="text" class="form-control" placeholder="Search Here..."  name="search" id="search">
            </center>
        </div>

        <br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Operator</th>
                    <th>Manager</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>



        <script>
            $(document).ready(function(){
                fetch_customer_data();

                function fetch_customer_data(query = ''){
                    $.ajax({
                        url: "{{ route('home.search') }}",
                        method: 'GET',
                        data : {query : query},
                        dataType: 'json',
                        success: function(data){
                            $('tbody').html(data.table_data);

                        }
                    })
                }

                $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    console.log(query);
                    fetch_customer_data(query);
                });

            });
        </script>
        
@endsection