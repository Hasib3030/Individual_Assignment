
@extends('Layouts.App')

@section('content')
        <br>
        <center>
            <h2>Welcome to Home Page [{{session('username')}}]</h2>
        </center>

        <div class="container bg card">
            <p>
                A paragraph is a series of related sentences developing a central idea, 
                called the topic. Try to think about paragraphs in terms of thematic 
                unity: a paragraph is a sentence or a group of sentences that supports 
                one central, unified idea. Paragraphs add one idea at a time to your 
                broader argument.
            </p>
        </div>

@endsection