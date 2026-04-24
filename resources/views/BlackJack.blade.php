@extends('app')

@section('styles')
<style>
.manga-container {
    display: flex;
    justify-content: center;   /* centers whole content */
    align-items: flex-start;
    gap: 40px;
    padding: 40px;
    background-color: black;
    color: white;
}

.manga-left img {
    width: 260px;
    border-radius: 10px;
}

.manga-right {
    width: 400px;
    background: #111;
    padding: 20px;
    border-radius: 10px;
}

.manga-title {
    font-size: 32px;
    margin-bottom: 10px;
}

.manga-description {
    color: #aaa;
    margin-bottom: 20px;
}

.chapter-list {
    list-style: none;
    padding: 0;
}

.chapter-list li {
    background: #1a1a1a;
    margin-bottom: 10px;
    border-radius: 6px;
    transition: 0.3s;
}

.chapter-list li a {
    display: block;
    padding: 12px;
    color: white;
    text-decoration: none;
}

.chapter-list li:hover {
    background: crimson;
}

.empty-message {
    color: #888;
}
</style>
@endsection

@section('content')

<section class="manga-container">

    <!-- COVER -->
    <div class="manga-left">
        <img src="{{ asset('images/BlackJackVolume1Chapter1/1.jpeg') }}" alt="BlackJack Cover">
    </div>

    <!-- CHAPTERS -->
    <div class="manga-right">

        <div class="manga-title">BlackJack</div>

        <div class="manga-description">
            A mysterious.
        </div>

        <h3>Chapters</h3>

        <ul class="chapter-list">

            @php
                $chapters = [
                    ['title' => 'Volume 1 Chapter 1', 'route' => 'BlackJackVolume1Chapter1']
                ];
            @endphp

            @forelse($chapters as $chapter)
                <li>
                    <a href="{{ route($chapter['route']) }}">
                        {{ $chapter['title'] }}
                    </a>
                </li>
            @empty
                <p class="empty-message">No chapters available.</p>
            @endforelse

        </ul>

    </div>

</section>

@endsection