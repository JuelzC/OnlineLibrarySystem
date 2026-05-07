@extends('app')

@section('content')

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

                <li>

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

@endsection