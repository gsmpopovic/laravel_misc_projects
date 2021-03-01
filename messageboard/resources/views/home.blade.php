@extends("master")

@section("title", "title")

@section("content")

<form action="/create" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" placeholder="title" name="title">
    <input type="text" placeholder="content" name="content">
    <input type="submit">
</form>
<h1>Recent Messages</h1>
    <ul>
        @foreach ($messages as $message)
            <li><h2>{{$message->title}}</h2><br>
                <p>{{$message->content}}</p><br>
                <p>{{$message->created_at->diffforhumans()}}</p><br>
                <a href="Message/{{$message->id}}">View Message</a>
                <hr>
            </li>        
        @endforeach
    </ul>

@endsection