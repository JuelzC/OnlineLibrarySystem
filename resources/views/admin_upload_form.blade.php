@extends('app')

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