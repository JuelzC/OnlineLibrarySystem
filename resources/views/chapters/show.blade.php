@extends('app')

@section('content')

<div style="background:black; padding:20px; min-height:100vh;">

    <h1 style="color:white; text-align:center; margin-bottom:20px;">
        {{ $book->title }}
        -
        Chapter {{ $chapter->chapter_number }}
    </h1>

    {{-- Navigation Buttons Top --}}
    <div style="text-align:center; margin-bottom:30px;">

        @if($previousChapter)
            <a href="{{ route('chapters.show', [
                'book' => $book->book_id,
                'chapter' => $previousChapter->chapter_id
            ]) }}"
            style="
                background:orangered;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:5px;
                margin-right:10px;
                display:inline-block;
            ">
                ← Previous Chapter
            </a>
        @endif

        @if($nextChapter)
            <a href="{{ route('chapters.show', [
                'book' => $book->book_id,
                'chapter' => $nextChapter->chapter_id
            ]) }}"
            style="
                background:#444;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:5px;
                display:inline-block;
            ">
                Next Chapter →
            </a>
        @endif

    </div>

    {{-- Manga Pages --}}
    @foreach($pages as $page)

        <img
            src="{{ asset('storage/' . $page->image) }}"
            style="
                width:100%;
                max-width:900px;
                display:block;
                margin:auto;
                margin-bottom:20px;
            ">

    @endforeach

    {{-- Navigation Buttons Bottom --}}
    <div style="text-align:center; margin-top:30px;">

        @if($previousChapter)
            <a href="{{ route('chapters.show', [
                'book' => $book->book_id,
                'chapter' => $previousChapter->chapter_id
            ]) }}"
            style="
                background:#444;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:5px;
                margin-right:10px;
                display:inline-block;
            ">
                ← Previous Chapter
            </a>
        @endif

        @if($nextChapter)
            <a href="{{ route('chapters.show', [
                'book' => $book->book_id,
                'chapter' => $nextChapter->chapter_id
            ]) }}"
            style="
                background:#444;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:5px;
                display:inline-block;
            ">
                Next Chapter →
            </a>
        @endif

    </div>

</div>

@endsection