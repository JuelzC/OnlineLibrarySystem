@extends('app')
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #0f0f0f;
    color: white;
}

/* Title */
.title {
    text-align: center;
    margin-top: 50px;
}

.title h1 {
    font-size: 42px;
    color: crimson;
    letter-spacing: 2px;
}

/* Card */
.card {
    width: 420px;
    margin: 40px auto;
    background-color: #1a1a1a;
    padding: 40px;
    border-radius: 14px;
    box-shadow: 0 0 20px rgba(220, 20, 60, 0.35);
    border: 1px solid rgba(220, 20, 60, 0.3);
}

/* Labels */
.card label {
    color: #ddd;
    font-size: 15px;
    font-weight: bold;
}

/* Inputs */
.card input {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 18px;
    border: 1px solid #333;
    border-radius: 8px;
    background-color: #111;
    color: white;
    font-size: 15px;
    transition: 0.3s;
}

.card input:focus {
    outline: none;
    border-color: crimson;
    box-shadow: 0 0 10px rgba(220, 20, 60, 0.5);
}

/* Button */
.btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background-color: crimson;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background-color: #ff1744;
    transform: scale(1.02);
}

/* Register Text */
.newUser {
    color: #ccc;
    text-align: center;
    padding-top: 30px;
    font-size: 15px;
}

.newUser a {
    color: crimson;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.newUser a:hover {
    color: white;
    text-decoration: underline;
}

/* Logo */
.logo {
    color: white;
    font-size: 24px;
    font-weight: bold;
}

.logo span {
    color: crimson;
}
</style>

<div class="title"> 
    <h1>Login</h1>
</div>

<div class="card">
  
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required>

    <label>Password</label><br>
    <input type="password" name="password" required>

    <button type="submit" class="btn">Login</button>
    </form>

    <p class="newUser">
        Don't have an account? 
        <a href="{{ route('register') }}">Register here</a>.
    </p>
</div>


@endsection