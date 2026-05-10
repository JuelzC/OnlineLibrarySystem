<!DOCTYPE html>
<html>
<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            background: black;
            color: white;

            min-height: 100vh;

            display: flex;
            flex-direction: column;
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

        a {
            text-decoration: none;
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

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: orangered;
            font-style: italic;
        }

        .content {
            flex: 1;
        }

        .card {
            padding: 25px;
            border-radius: 8px;
            flex-direction: column;
            justify-items: center;
        }

        .headerButtons,
        .perChapter {
            display: inline-block;
            background: crimson;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .headerButtons:link,
        .headerButtons:visited {
            color: white;
            text-decoration: none;
        }

        .headerButtons:hover,
        .perChapter:hover {
            background: darkred;
            transition: 0.3s;
            text-decoration: none;
        }

        .headerButtons:active,
        .perChapter:active {
            transform: scale(0.90);
            transition: transform 0.05s ease;
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

<body>

    <header>
        <div class="logo">Manga<span>Verse</span></div>

        <nav>
            <a class="headerButtons" href="{{ route('home') }}">Home</a>
            <a class="headerButtons" href="{{ route('search') }}">Search</a>
        </nav>

        <div class="header-actions">
            @auth
                <a class="headerButtons" href="{{ route('user-profile') }}">Profile</a>

                <form action="{{ route('logout') }}" method="POST" class="inline-form">
                    @csrf
                    <button class="headerButtons" type="submit">Logout</button>
                </form>
            @else
                <a class="headerButtons" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer>
        <p>MangaVerse &copy; 2026</p>
    </footer>

</body>
</html>