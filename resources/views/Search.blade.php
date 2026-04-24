<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<style>

body{
    background:#0d0f14;
    color:white;
    font-family:Arial;
}

.container{
    width:80%;
    margin:auto;
}

.search-box{
    background:#141821;
    padding:30px;
    border-radius:8px;
}

input[type=text]{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:20px;
    background:#0d0f14;
    border:1px solid #333;
    color:white;
}

select{
    padding:8px;
    background:#0d0f14;
    border:1px solid #333;
    color:white;
}

.genres{
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:10px;
    margin-top:20px;
}

button{
    margin-top:20px;
    padding:10px 20px;
    border:none;
    background:#2d8cff;
    color:white;
    cursor:pointer;
}

button:hover{
    background:#1f6fd6;
}

</style>
<body>
  <div class="container">

<h1>Search Books</h1>

<div class="search-box">

<form method="POST" action="/search">

@csrf

<label>Title</label>

<br>

<input type="text" name="title">

<h3>Genres</h3>

<div class="genres">

@foreach($genres as $genre)

<label>

<input type="checkbox" name="genres[]" value="{{$genre->genre_id}}">

{{$genre->name}}

</label>

@endforeach

</div>

<button type="submit">Search</button>

</form>

</div>

<div class="book-grid">

@foreach($books as $book)

<div class="book-card">

<h3>{{$book->title}}</h3>

<p>{{$book->author}}</p>

<p>

@foreach($book->genres as $genre)

{{$genre->name}}

@endforeach

</p>

</div>

@endforeach

</div>

</div>
</body>
</html>