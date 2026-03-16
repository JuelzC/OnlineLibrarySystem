@extends('app')

@section('content')

<h1>Login</h1>

<div class="card">
    <form>
        <label>Email</label><br>
        <input type="email" style="width:100%; padding:8px;"><br><br>

        <label>Password</label><br>
        <input type="password" style="width:100%; padding:8px;"><br><br>

        <button type="submit" class="btn">Login</button>
    </form>
</div>

@endsection