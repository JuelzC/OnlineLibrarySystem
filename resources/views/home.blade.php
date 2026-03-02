<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MangaVerse</title>
</head>
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
}

.card h3 {
    padding: 10px;
    font-size: 14px;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px crimson;
}

footer {
    text-align: center;
    padding: 20px;
    background-color: #1a1a1a;
    margin-to
}
.empty-message {
    color: #888;
    padding: 20px;
    font-size: 14px;
}
</style>
<body>
    <header>
    <div class="logo">Manga<span>Verse</span></div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Search</a>
        <a href="#">New Manga</a>
        <a href="#">Recent Chapters</a>
    </nav>
</header>


<section class="hero">
    <h1>Read Manga Online</h1>
    <p>Discover the latest and greatest manga chapters.</p>
</section>
<section class="section">
    <h2>Featured Manga</h2>
    <div class="card-container">

        <?php
        $featured = []; 

        if (!empty($featured)) {
            foreach ($featured as $manga) {
                echo "
                <div class='card'>
                    <img src='{$manga['image']}' alt='Manga'>
                    <h3>{$manga['title']}</h3>
                </div>
                ";
            }
        } else {
            echo "<p class='empty-message'>No featured manga available.</p>";
        }
        ?>

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
<footer>
    <p>© <?php echo date("Y"); ?> MangaVerse. All Rights Reserved.</p>
</footer>
</body>
</html>