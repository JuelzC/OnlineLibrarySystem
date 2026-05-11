@extends('app')

@section('styles')
<style>
    body {
        background-color: #111;
        color: white;
    }

    h1 {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 30px;
        color: orangered;
        font-size: 42px;
    }

    p {
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .request-form {
        max-width: 600px;
        margin: 0 auto 50px auto;
        background: #1b1b1b;
        padding: 40px;
        border-radius: 12px;
        border: 2px solid crimson;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #ccc;
        font-size: 18px;
    }

    input[type="text"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #444;
        background: #222;
        color: white;
        font-size: 16px;
        margin-bottom: 20px;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: crimson;
        box-shadow: 0 0 5px crimson;
    }

    button[type="submit"] {
        width: 100%;
        height:40px;
        background: crimson;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button[type="submit"]:hover {
        background: darkred;
    }

    button[type="submit"]:active {
        transform: scale(0.97);
    }

    .success-message {
        text-align: center;
        color: lightgreen;
        margin-bottom: 20px;
    }


    .inline-form {
        display: inline-flex;
        margin: 0;
        align-items: center;
    }

    .headerButtons {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .logout-btn {
        font: inherit;
        cursor: pointer;
        border: none;
    }
</style>
@endsection

@section('content')

<h1>Request a Manga</h1>

@if(session('success'))
    <p class="success-message">
        {{ session('success') }}
    </p>
@endif

<form class="request-form" method="POST" action="/request-manga">
    @csrf

    <label>Manga Title</label>
    <input type="text" name="title" required>

    <label>MyAnimeList Link</label>
    <input type="text" name="mal_link" required>

    <button type="submit">
        Submit Request
    </button>
</form>

@endsection