@extends('app')

@section('content')

<style>
body{
    background:#0d0f14;
    color:white;
    font-family:Arial;
}

.container{
    width:80%;
    margin:auto;
    padding-top:30px;
}

.search-box{
    background:#141821;
    padding:30px;
    border-radius:8px;
    margin-bottom:30px;
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

button{
    margin-top:10px;
    padding:10px 20px;
    border:none;
    background:#2d8cff;
    color:white;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:#1f6fd6;
}

.book-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(180px, 1fr));
    gap:20px;
}

.book-card{
    background:#141821;
    border-radius:8px;
    overflow:hidden;
    text-decoration:none;
    color:white;
    transition:0.3s;
    display:block;
}

.book-card img{
    width:100%;
    height:240px;
    object-fit:cover;
}

.book-card h3{
    font-size:14px;
    padding:10px;
}

.book-card p{
    padding:0 10px 10px;
    font-size:12px;
    color:#aaa;
}

.book-card:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px crimson;
}

.empty-message{
    color:#888;
    margin-top:20px;
}
</style>

<div class="container">

    <h1>Search Books</h1>

    <div class="search-box">

        <form method="GET" action="{{ route('search') }}">

            <label>Title</label>

            <input 
                type="text" 
                name="title" 
                value="{{ request('title') }}"
                placeholder="Search by title..."
            >

            <button type="submit">Search</button>

        </form>

    </div>

    <div class="book-grid">

        @if(isset($books) && $books->count())

            @foreach($books as $book)

                <a href="{{ route('manga.show', $book->book_id) }}" class="book-card">

                    <img src="{{ $book->cover_image 
                        ? asset('storage/' . $book->cover_image)
                        : asset('images/default-cover.jpg') }}">

                    <h3>{{ $book->title }}</h3>

                    <p>
                        @if($book->genres)
                            @foreach($book->genres as $genre)
                                {{ $genre->name }} 
                            @endforeach
                        @endif
                    </p>

                </a>

            @endforeach

        @else

            <p class="empty-message">No results found.</p>

        @endif

    </div>

</div>

@endsection