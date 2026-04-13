<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Manga</title>
</head>
<body>
    <H1>Request a manga</H1>
    @if(session('success'))
    <p style = "color: green;">
        {{ session ('success') }}

    </p>
    @endif
    <form method="POST" action="/request-manga">
        @csrf

        <label>Manga Title</label>
        <br>
        <input type="text" name="title" required>

        <br><br>

        <label>MyAnimeList Link</label>
        <br>
        <input type="text" name="mal_link" required>

        <br><br>

        <button type="submit">
            Submit Request
        </button>

    </form>
    
</body>
</html>