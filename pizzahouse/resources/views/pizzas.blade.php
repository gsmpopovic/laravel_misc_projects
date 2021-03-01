@extends ('layouts.layout')

@section('body')
            <h1>Pizza styles</h1>
    {{-- 
            <h2>hawaiian:</h2>        
            <p> Base: {{$hawaiian ?? ''['base']}}</p>
            <p> Toppings: {{$hawaiian ?? ''['toppings'][0]}}, {{$hawaiian ?? ''['toppings'][1]}}</p> --}}

            @foreach($pizzas as $pizza)
            {{-- <p>{{$pizza['type']}}</p>
            <p>{{$pizza['base']}}</p> --}}
            @endforeach
            
@endsection