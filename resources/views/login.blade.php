@extends('app')

@section('content')

<style> 
* {
    /* background-color: black; */
}
.newUser {
    color: crimson;
}
</style>
<h1>Login</h1>

<div class="card">
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required style="width:100%; padding:8px;"><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width:100%; padding:8px;"><br><br>

    <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
</div>

@endsection