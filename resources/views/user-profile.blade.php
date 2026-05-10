
@extends('home')

@section('content')

<section class="hero">
    <h1>My Profile</h1>
    <p>Your bookmarked manga collection</p>
</section>

<section class="section">
    <h2>Bookmarked Manga</h2>

    @if($bookmarks->count())

        <div class="card-container">

            @foreach($bookmarks as $manga)

                <a href="{{ route('manga.show', $manga->book_id) }}" class="card">

                    <img src="{{ $manga->cover_image ? asset('storage/' . $manga->cover_image) : asset('images/default-cover.jpg') }}">

                    <h3>{{ $manga->title }}</h3>

                </a>

            @endforeach

        </div>

    @else
        <p class="empty-message">You have no bookmarks yet.</p>
    @endif

</section>

@endsection