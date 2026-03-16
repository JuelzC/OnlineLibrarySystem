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
    <div>
        <a href="{{ route('home') }}">Home Page</a>
        <a href="{{ route('random.book') }}">Random Book</a>
    </div>
    <div>
        <a href="{{ route('login') }}" class="btn">Sign In</a>
        <a href="{{ route('register') }}" class ="btn"> Create An Account</a>
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