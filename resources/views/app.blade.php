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

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: orangered;
            font-style: italic;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .admin-links {
            display: flex;
            gap: 10px;
            margin-left: 10px;
            padding-left: 10px;
            border-left: 2px solid #444;
            flex-wrap: wrap;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .inline-form {
            display: inline;
        }

        .headerButtons {
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

        .headerButtons:hover {
            background: darkred;
        }

        .content {
            flex: 1;
        }

        footer {
            background: #222;
            text-align: center;
            padding: 20px;
        }
    </style>

    @yield('styles')
</head>

<body>

<header>
    <div class="logo">Manga<span>Verse</span></div>

    <nav style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
        <a class="headerButtons" href="{{ route('home') }}">Home</a>
        <a class="headerButtons" href="{{ route('search') }}">Search</a>
        <a class="headerButtons" href="/new-manga">New Manga</a>
        <a class="headerButtons" href="/request-manga">Request Manga</a>
        <a class="headerButtons" href="{{ route('chapters.latest') }}">Latest Chapters</a>

        @auth
            @if(auth()->user()->role_id == 1)
                <a class="headerButtons" href="{{ route('upload-manga') }}">Add Manga</a>
                <a class="headerButtons" href="{{ route('admin.homepage') }}">Admin Dashboard</a>
                <a class="headerButtons" href="{{ route('admin.requests') }}">Manga Requests</a>
                <a class="headerButtons" href="{{ route('admin.approvals') }}">User Management</a>
            @endif
        @endauth
    </nav>

    <div class="header-actions" style="display:flex; align-items:center; gap:10px;">
        @auth
            <a class="headerButtons" href="{{ route('user-profile') }}">Profile</a>

            <form action="{{ route('logout') }}" method="POST" class="inline-form" style="margin:0;">
                @csrf
                <button type="submit" class="headerButtons">
                    Logout
                </button>
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