<form action="/admin/upload-manga" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Manga Title" required>
    <input type="text" name="author" placeholder="Author" required>

    <input type="number" name="chapter_number" placeholder="Chapter #" required>
    <input type="text" name="chapter_title" placeholder="Chapter Title">

    <input type="file" name="pages[]" multiple required>

    <button type="submit">Upload</button>
</form>