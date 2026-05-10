@extends('app')
<style>
    body {
        background-color: #111;
        color: white;
    }

    form {
        max-width: 800px;
        margin: 40px auto;
        background: #1b1b1b;
        padding: 40px;
        border-radius: 12px;
        border: 2px solid crimson;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }

    h3 {
        margin-top: 25px;
        margin-bottom: 15px;
        color: crimson;
        border-bottom: 2px solid #333;
        padding-bottom: 8px;
        font-size: 24px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 18px;
        border-radius: 8px;
        border: 1px solid #444;
        background: #222;
        color: white;
        font-size: 15px;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        outline: none;
        border-color: crimson;
        box-shadow: 0 0 5px crimson;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #ccc;
        font-size: 16px;
    }

    hr {
        border: none;
        height: 1px;
        background: #333;
        margin: 25px 0;
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

@section('content')
<form action="/admin/upload-manga" method="POST" enctype="multipart/form-data">
    @csrf

    <h3>Manga Info</h3>

    <input type="text" name="title" placeholder="Manga Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="description" placeholder="Manga Description">

    <hr>

    <h3>Cover Image</h3>
    <label>Upload Book Cover as Cover Image</label>
    <input type="file" name="cover_image" accept="image/*">

    <hr>

    <h3>Chapter Info</h3>

    <input type="number" name="chapter_number" placeholder="Chapter Number" required>
    <input type="text" name="chapter_title" placeholder="Chapter Title">

    <hr>

    <h3>Chapter Pages</h3>
    <input type="file" name="pages[]" multiple required>


    <br><br>

    <button type="submit">Upload Chapter</button>
</form>

@endsection 