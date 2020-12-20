@extends('layout.app')

@section('content')
    <h1>Contact page</h1>
    <p> {{ $name }} {{ $id }}</p>

    @if (count($people))
        @foreach ($people as $person)
            <li>{{ $person }}</li>
        @endforeach 
    @endif
@endsection

@section('footer')
    <h2>This is footert</h2>
@endsection