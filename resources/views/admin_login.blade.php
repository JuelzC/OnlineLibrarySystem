
@extends('login')
<style> 
* {
    /* background-color: black; */
}
.newUser {
    color: crimson;
    padding-top: 45px;
    padding-bottom: 30px;
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
</style>
@section('content')

<div class="card">
    <div class = "title"> 
    <h1>Admin Login</h1>
</div>
  
    <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required style="width:100%; padding:8px;"><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width:100%; padding:8px;"><br><br>

    <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
    <p class="newUser">Don't have an account? <a href="{{ route('signup') }}">Register here</a>.</p>
</div>


@endsection