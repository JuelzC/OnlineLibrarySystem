<!DOCTYPE html>
<html>
<head>
    <title>Book Management System</title>

    <style>
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
            padding: 8px 14px;
            border-radius: 4px;
            color: white;
            justify-self: center;
        }

        .content {
            padding: 40px;
            min-height: 70vh;
        }

        .card {
            background: white;
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
</head>
<body>

<header>
    <div class="logo">Manga<span>Verse</span></div>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('search') }}">Search</a>
        <a href="#">New Manga</a>
        <a href="#">Recent Chapters</a>
    </nav>
    <div class="header-actions">
        @guest
            <a href="{{ route('login') }}" class="btn">Login</a>
        @else
            <form method="POST" action="{{ route('logout') }}" class="inline-form">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        @endguest
    </div>
</header>

<div class="content">
    @yield('content')
</div>

<footer>
    <p>filler</p>
</footer>

</body>
</html>