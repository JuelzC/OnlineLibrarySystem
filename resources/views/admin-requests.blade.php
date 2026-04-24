<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manga Requests</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #111;
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            background-color: #1a1a1a;
            border-bottom: 2px solid #222;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            color: crimson;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            transition: 0.3s;
        }

        nav a:hover {
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
        }

        .section h2 {
            margin-bottom: 20px;
            border-left: 5px solid crimson;
            padding-left: 10px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #1a1a1a;
            border-radius: 8px;
            overflow: hidden;
            transition: 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px crimson;
        }

        .card h3 {
            font-size: 16px;
        }

        .card p {
            font-size: 14px;
            color: #ccc;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #1a1a1a;
            margin-top: 40px;
        }

        .empty-message {
            color: #888;
            padding: 20px;
            font-size: 14px;
            text-align: center;
        }

        button {
            transition: 0.3s;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">Manga<span>Hub</span></div>

    <nav>
        <a href="/">Home</a>
        <a href="/search">Search</a>
        <a href="/request-manga">Request Manga</a>
        <a href="/admin/requests">Admin</a>
    </nav>
</header>

<div class="section">

    @if(session('success'))
        <p style="color: lightgreen; margin-bottom: 20px; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <h2>Manga Requests</h2>

    <div class="card-container">
        @forelse($requests as $request)
            <div class="card">
                <div style="padding: 20px;">
                    <h3>{{ $request->title }}</h3>

                    <p style="margin-top: 10px;">
                        <strong>Status:</strong> {{ ucfirst($request->status) }}
                    </p>

                    <p style="margin-top: 10px;">
                        <a href="{{ $request->mal_link }}" target="_blank" style="color: crimson;">
                            View MyAnimeList
                        </a>
                    </p>

                    <div style="margin-top: 15px;">
                        <form action="/admin/requests/approve/{{ $request->request_id }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background: crimson; color: white; border: none; padding: 8px 12px; cursor: pointer; border-radius: 5px;">
                                Approve
                            </button>
                        </form>

                        <form action="/admin/requests/reject/{{ $request->request_id }}" method="POST" style="display:inline; margin-left: 10px;">
                            @csrf
                            <button type="submit" style="background: #333; color: white; border: none; padding: 8px 12px; cursor: pointer; border-radius: 5px;">
                                Reject
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="empty-message">No manga requests found.</p>
        @endforelse
    </div>

</div>

<footer>
    © {{ date('Y') }} MangaHub
</footer>

</body>
</html>