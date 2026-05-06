<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

public function uploadManga(Request $request)
{
    // Admin check (adjust based on your system)
    if (session('role_id') != 2) {
        return redirect('/')->with('error', 'Unauthorized');
    }

    
    $book = Book::create([
        'title' => $request->title,
        'author' => $request->author
    ]);

    $chapter = Chapter::create([
        'book_id' => $book->book_id,
        'chapter_number' => $request->chapter_number,
        'title' => $request->chapter_title
    ]);

    // Upload Pages
    $pageNumber = 1;

    foreach ($request->file('pages') as $file) {
        $path = $file->store(
            "manga/{$book->title}/chapter_{$chapter->chapter_number}",
            'public'
        );

        Page::create([
            'chapter_id' => $chapter->chapter_id,
            'page_number' => $pageNumber,
            'image' => $path
        ]);

        $pageNumber++;
    }

    return redirect('/admin')->with('success', 'Manga uploaded!');
}
}
