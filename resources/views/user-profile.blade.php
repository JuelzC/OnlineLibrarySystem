@extends('app')

@section('content')

<style>
body {
    background: black;
    color: white;
}

.hero {
    text-align: center;
    padding: 50px 20px;
    background: linear-gradient(to right, #1f1f1f, #141414);
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.profile-info {
    text-align: center;
    margin-top: 10px;
    color: #aaa;
}

.section {
    padding: 40px;
}

.section h2 {
    margin-bottom: 20px;
    border-left: 5px solid crimson;
    padding-left: 10px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 20px;
}

.card {
    background-color: #1a1a1a;
    border-radius: 8px;
    overflow: hidden;
    text-decoration: none;
    color: white;
    transition: 0.3s;
    display: block;
}

.card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
}

.card h3 {
    padding: 10px;
    font-size: 14px;
    color: white;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px crimson;
}

.empty-message {
    color: #888;
    text-align: center;
    padding: 20px;
}
</style>

<section class="hero">
    <h1>My Profile</h1>

    <div class="profile-info">
        <p>Email: {{ auth()->user()->email }}</p>
    </div>
</section>

<section class="section">
    <h2>Bookmarked Manga</h2>

    @if($bookmarks->count())

        <div class="card-container">

            @foreach($bookmarks as $manga)

                <a href="{{ route('manga.show', $manga->book_id) }}" class="card">

                    <img src="{{ $manga->cover_image 
                        ? asset('storage/' . $manga->cover_image) 
                        : asset('images/default-cover.jpg') }}">

                    <h3>{{ $manga->title }}</h3>

                </a>

            @endforeach

        </div>

    @else

        <p class="empty-message">You have no bookmarks yet.</p>

    @endif

</section>

@endsection