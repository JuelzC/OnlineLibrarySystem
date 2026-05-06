
<!DOCTYPE html>
<html>
<head>

    <style>
        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background: #222;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        header a:hover {
            text-decoration: underline;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .inline-form {
            display: inline;
            margin: 0;
        }

        .btn {
            background: black;
            color: white;
            padding: 8px 14px;
            border-radius: 20px;
            border-color: crimson;
            justify-self: center;
        }

        .content {
            min-height: 70vh;
        }

        .card {
            padding: 25px;
            border-radius: 8px;
            flex-direction: column;
            justify-items: center;
        }

        footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
    @yield('styles')
</head>
<header>
    <div class="logo">Manga<span>Verse</span></div>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('search') }}">Search</a>
        <a href="#">New Manga</a>
        <a href="#">Recent Chapters</a>
    </nav>
    <div class="header-actions">
        @auth
            <a href="{{ route('user-profile') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="inline-form">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</header>
<body style="margin:0;">
    @yield('content')
</body>

<footer>
    <p>MangaVerse &copy; 2023</p>
</footer>

</html>