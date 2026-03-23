@extends('app')

@section('content')

<Title> Create an Account</Title>

<h1> Create Account </h1>

@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label> First Name</label>
    <input type="text" name="fname" required>

    <label> Last Name</label>
    <input type="text" name="lname" required>

    <label> Email</label>
    <input type="email" name="email" required>

    <label>Create Password</label>
    <input type="password" name="password">

    <button class="signup"> Create Account</button>
</form>
@endsection