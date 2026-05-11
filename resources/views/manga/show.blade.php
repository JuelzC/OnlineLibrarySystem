@extends('app')

<style>
body {
    background: black;
    color: white;
}

.page-container {
    display: flex;
    gap: 40px;
    padding: 50px;
    max-width: 1100px;
    margin: auto;
}

/* LEFT SIDE (cover) */
.book-cover {
    flex-shrink: 0;
}

.book-cover img {
    width: 280px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(255, 0, 0, 0.2);
}

/* RIGHT SIDE */
.book-info {
    flex: 1;
}

.book-info h1 {
    font-size: 32px;
    margin-bottom: 15px;
}

.book-info p {
    color: #ccc;
    line-height: 1.6;
    margin-bottom: 25px;
}

/* CHAPTER LIST */
.chapter-list {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    list-style: none;
    padding: 0;
}

.perChapter {
    list-style: none;
}

.perChapter a {
    display: inline-block;
    padding: 10px 18px;
    background: crimson;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    transition: 0.2s;
}

.perChapter a:hover {
    background: darkred;
    transform: scale(1.05);
}

/* BOOKMARK BOX */
.bookmark {
    margin-top: 30px;
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
}

.headerButtons {
    display: inline-block;
    background: crimson;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
}

.headerButtons:hover {
    background: darkred;
}

</style>

@section('content')

<div class="page-container">

    <!-- COVER -->
    <div class="book-cover">
        <img src="{{ asset('storage/' . $book->cover_image) }}">
    </div>

    <!-- INFO -->
    <div class="book-info">

        <h1>{{ $book->title }}</h1>

        <p>{{ $book->description }}</p>

        <h2>Chapters</h2>

        <ul class="chapter-list">

            @forelse($chapters as $chapter)
                <li class="perChapter">
                    <a href="{{ route('chapters.show', [$book->book_id, $chapter->chapter_id]) }}">
                        Chapter {{ $chapter->chapter_number }}
                    </a>
                </li>
            @empty
                <li>No chapters yet.</li>
            @endforelse

        </ul>

        <!-- BOOKMARK -->
        <div class="bookmark">

            @auth

                @php
                    $isBookmarked = auth()->user()
                        ->bookmarks()
                        ->where('bookmarks.book_id', $book->book_id)
                        ->exists();
                @endphp

                <form action="{{ route('books.bookmark', $book->book_id) }}" method="POST">
                    @csrf

                    <button type="submit" class="headerButtons">
                        {{ $isBookmarked ? 'Remove Bookmark' : 'Bookmark Manga' }}
                    </button>

                </form>

            @else

                <a class="headerButtons" href="{{ route('login') }}">
                    Login to Bookmark
                </a>

            @endauth

        </div>

    </div>

</div>

@endsection