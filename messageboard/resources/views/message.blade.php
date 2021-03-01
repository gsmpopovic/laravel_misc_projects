@extends("master")

@section("title", "{{$message->title}}")

@section("content")

<h3>{{$message->title}}</h3><br>
<p>{{$message->content}}</p><br>
<p>{{$message->created_at->diffforhumans()}}</p>

<a href="/">Return to Home</a>
@endsection