@extends('app')


<style>
body {
    background-color: black;
    color: white;
    font-family: Arial, sans-serif;
}

.signup-container {
    max-width: 400px;
    margin: 80px auto;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px crimson;
}

.signup-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.signup-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
}

.signup-container button {
    width: 100%;
    padding: 10px;
    background: crimson;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}

.signup-container button:hover {
    background: darkred;
}
</style>

@section('content')
<div class="signup-container">
    <h2>Create Admin Account</h2>

    @if(session('success'))
        <p style="color: lightgreen;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.signup.submit') }}">
        @csrf

        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="date" name="date_of_birth" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Create Admin</button>
    </form>
</div>

@endsection