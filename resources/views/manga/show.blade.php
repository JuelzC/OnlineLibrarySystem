@extends('app')


<style> 
    ul {
        text-decoration: none;
    }
    .perChapter {
        list-style: none;
        text-decoration: none;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        background: crimson;
        display: inline-block;
        border-radius: 25px;
    }
    .perChapter:visited, .perChapter:link, .perChapter a {
        color: white;
        text-decoration: none;
    }
    body {
        background: black;
        color: white;
    }
</style>
@section('content')
<body>
<div style="display:flex; gap:40px; padding:40px;">

    <div>
        <img
            src="{{ asset('storage/' . $book->cover_image) }}"
            width="250">
    </div>

    <div>

        <h1>{{ $book->title }}</h1>

        <p>{{ $book->description }}</p>

        <h2>Chapters</h2>

        <ul>

            @forelse($chapters as $chapter)

                <li class="perChapter">

                    <a href="{{ route(
                        'chapters.show',
                        [$book->book_id, $chapter->chapter_id]
                    ) }}">

                        Chapter {{ $chapter->chapter_number }}

                    </a>

                </li>

            @empty

                <li>No chapters yet.</li>

            @endforelse

        </ul>

    </div>

</div>
</body>
@endsection