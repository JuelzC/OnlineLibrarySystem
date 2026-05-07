@extends('app')

@section('styles')
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


.logo {
    font-size: 24px;
    font-weight: bold;
}

.logo span {
    color: crimson;
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
    background-color: #1a1a1a;
    border-radius: 8px;
    overflow: hidden;
    transition: 0.3s;
    cursor: pointer;
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
    padding: 20px;
    font-size: 14px;
}

#flash-message {
    position: fixed;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -50%);
    
    background-color: #28a745;
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    
    z-index: 9999;
    transition: opacity 1s ease;
}

</style>

@if(session('success'))
    <div id="flash-message">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('flash-message').style.opacity = '0';
        }, 2000); 

        setTimeout(() => {
            document.getElementById('flash-message').remove();
        }, 3000); 
    </script>
@endif

@section('content')
<header>

</header>
<section class="hero">
    <h1>Read Manga Online</h1>
    <p>Discover the latest and greatest manga chapters.</p>
</section>
<section class="section">
    <h2>Featured Manga</h2>
    <div class="card-container">

        @if(!empty($featured) && $featured->count())
            @foreach($featured as $manga)
                <a href="{{ route('manga.show', $manga->book_id) }}" class="card">
                    <img src="{{ $manga->cover_image ? asset('storage/' . $manga->cover_image) : asset('images/default-cover.jpg') }}" alt="{{ $manga->title }} Cover">
                    <h3>{{ $manga->title }}</h3>
                </a>
            @endforeach
        @else
            <p class="empty-message">No featured manga available.</p>
        @endif

    </div>
</section>
<section class="section">
    <h2>New Chapters</h2>
    <div class="card-container">

        <?php
        $newChapters = []; 

        if (!empty($newChapters)) {
            foreach ($newChapters as $chapter) {
                echo "
                <div class='card'>
                    <img src='{$chapter['image']}' alt='Chapter'>
                    <h3>{$chapter['title']}</h3>
                </div>
                ";
            }
        } else {
            echo "<p class='empty-message'>No new chapters available.</p>";
        }
        ?>

    </div>
</section>
@endsection
</html>