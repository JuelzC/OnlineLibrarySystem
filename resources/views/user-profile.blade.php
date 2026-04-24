@extends('app')

@section('content')
@if(Auth::check())
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>This is your user profile page.</p>
@else
    <h1>Welcome to MangaVerse!</h1>
    <p>Please <a href="{{ route('login') }}">log in</a> to view your profile.</p>
@endif
@endsection
<Title> User Profile </Title> 

<body> 
    <p> 

    </p> 
</body>