@extends('app')

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: black;
    color: white;
}

.hero {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(to right, #1f1f1f, #141414);
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.hero p {
    color: #ccc;
}

.section {
    padding: 40px;
    background-color: black;
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
    position: relative;
    background-color: #1a1a1a;
    border-radius: 8px;
    overflow: hidden;
    transition: 0.3s;
    cursor: pointer;
    text-decoration: none;
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

.new-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: crimson;
    color: white;
    padding: 5px 8px;
    font-size: 12px;
    border-radius: 5px;
}

.empty-message {
    color: #888;
    padding: 20px;
    font-size: 14px;
}
</style>

@section('content')

<section class="hero">
    <h1>New Manga</h1>
    <p>Read the newest manga chapters updated daily.</p>
</section>

<section class="section">

    <h2>Latest Releases</h2>

    <div class="card-container">

        @if(!empty($newManga) && $newManga->count())

            @foreach($newManga as $manga)

                <a href="{{ route('manga.show', $manga->book_id) }}" class="card">

                    <span class="new-badge">NEW</span>

                    <img src="{{ $manga->cover_image ? asset('storage/' . $manga->cover_image) : asset('images/default-cover.jpg') }}" alt="{{ $manga->title }} Cover">

                    <h3>{{ $manga->title }}</h3>

                </a>

            @endforeach

        @else

            <p class="empty-message">No new manga available.</p>

        @endif

    </div>

</section>

@endsection