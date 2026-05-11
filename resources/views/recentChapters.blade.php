@extends('app')

@section('content')

<style>
    body {
        background: #111;
        color: white;
    }

    h1 {
        margin: 30px 0;
        text-align: center;
        color: crimson;
        font-size: 40px;
    }

    .chapter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        padding: 20px 40px;
    }

    .chapter-card {
        background: #1b1b1b;
        border-radius: 10px;
        overflow: hidden;
        text-decoration: none;
        color: white;
        transition: 0.3s;
        display: block;
        border: 1px solid #333;
    }

    .chapter-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 12px crimson;
    }

    .chapter-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        display: block;
    }

    .chapter-info {
        padding: 12px;
    }

    .title {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        color: white;
    }

    .chapter {
        font-size: 12px;
        color: #aaa;
        margin-bottom: 5px;
    }

    .meta {
        font-size: 11px;
        color: #666;
    }
</style>

<h1>Latest Released Chapters</h1>

<div class="chapter-grid">

@foreach ($chapters as $chapter)

    <a class="chapter-card" href="{{ route('chapters.show', [
        'book' => $chapter->book_id,
        'chapter' => $chapter->chapter_id
    ]) }}">

        <img src="{{ $chapter->book->cover_image
            ? asset('storage/' . $chapter->book->cover_image)
            : asset('images/default-cover.jpg') }}">

        <div class="chapter-info">

            <div class="title">
                {{ $chapter->book->title }}
            </div>

            <div class="chapter">
                Chapter {{ $chapter->chapter_number }}
                @if($chapter->chapter_title)
                    - {{ $chapter->chapter_title }}
                @endif
            </div>

            <div class="meta">
                {{ $chapter->created_at->diffForHumans() }}
            </div>

        </div>

    </a>

@endforeach

</div>

@endsection