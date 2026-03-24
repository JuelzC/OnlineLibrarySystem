@extends('app')

@section('content')

<h1>Random Book</h1>

@if($randomBook)
    <div class="card">
        <h2>{{ $randomBook->title }}</h2>
        <p><strong>Author:</strong> {{ $randomBook->author }}</p>
        <br>
        <a href="{{ route('random.book') }}" class="btn">Get Another Random Book</a>
    </div>
@else
    <p>No books found in the database.</p>
@endif

@endsection