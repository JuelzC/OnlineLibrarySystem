@extends('app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Manga</title>
</head>
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

    form {
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
    }

    input[type="text"]:focus {
        outline: none;
        border-color: crimson;
        box-shadow: 0 0 5px crimson;
    }

    button[type="submit"] {
        width: 100%;
        background: crimson;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s;
    }

    button[type="submit"]:hover {
        background: darkred;
    }

    button[type="submit"]:active {
        transform: scale(0.97);
    }
</style>

<body>
    <H1>Request a manga</H1>
    @if(session('success'))
    <p style = "color: green;">
        {{ session ('success') }}

    </p>
    @endif
    <form method="POST" action="/request-manga">
        @csrf

        <label>Manga Title</label>
        <br>
        <input type="text" name="title" required>

        <br><br>

        <label>MyAnimeList Link</label>
        <br>
        <input type="text" name="mal_link" required>

        <br><br>

        <button type="submit">
            Submit Request
        </button>

    </form>
    
</body>
</html>
@endsection