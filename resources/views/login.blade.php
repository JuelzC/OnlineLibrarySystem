@extends('app')
<style> 
* {
    /* background-color: black; */
}
.newUser{
    color: crimson;
    padding-top: 45px;
    padding-bottom: 30px;
    text-decoration: none;
    font: 16px Arial, sans-serif;
}
.newUser a {
    color: lightblue;
    text-decoration: none;
    font-weight: bold;
    font: 16px Arial, sans-serif;
    
}
.title{
    text-align: center;
    margin-top: 40px;
}
.logo {
    color: white;
    font-size: 24px;
    font-weight: bold;
}
.logo span {
    color: crimson;
}
.card {
    background: #222;
    padding: 30px;
    border-radius: 10px;
    max-width: 400px;
    margin: 40px auto;
}
</style>
@section('content')
<div class="card">
<div class = "title"> 
    <h1> Login</h1>
</div>
  
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required style="width:100%; padding:8px;"><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width:100%; padding:8px;"><br><br>

    <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
    <p class="newUser">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    <br>
    <p class="newUser">Are you an Admin? <a href="{{ route('admin.login') }}">Admin Login</a></p>
</div>


@endsection