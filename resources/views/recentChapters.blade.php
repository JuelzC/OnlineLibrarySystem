@extends('app')

@section('content')

<style>
    h1 {
        margin-bottom: 20px;
    }

    .chapter {
        background: crimson;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        display: block;
        width: 100%;
    }

    .chapter a {
        text-decoration: none;
        font-weight: bold;
        color: #ffffff;
        display: block;
    }

    .chapter a:hover {
        color: lightblue;
    }

    .meta {
        font-size: 12px;
        color: #ffffff;
        margin-top: 4px;
    }
</style>

<h1>Latest Released Chapters</h1>

@foreach ($chapters as $chapter)
    <div class="chapter">

        <a href="{{ route('chapters.show', [
            'book' => $chapter->book_id,
            'chapter' => $chapter->chapter_id
        ]) }}">
            {{ $chapter->book->title }} - Chapter {{ $chapter->chapter_number }}
        </a>

        <div>
            {{ $chapter->chapter_title }}
        </div>

        <div class="meta">
            Released {{ $chapter->created_at->diffForHumans() }}
        </div>

    </div>
@endforeach

@endsection