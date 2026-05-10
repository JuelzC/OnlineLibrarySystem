<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function show($bookId, $chapterId)
    {
        // Book (safe load)
        $book = Book::findOrFail($bookId);

        // Chapter MUST belong to this book (important fix)
        $chapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_id', $chapterId)
            ->firstOrFail();

        // Pages (use relationship instead of manual query)
        $pages = $chapter->pages;

        // Previous chapter (within same book)
        $previousChapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_number', '<', $chapter->chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

        // Next chapter (within same book)
        $nextChapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_number', '>', $chapter->chapter_number)
            ->orderBy('chapter_number', 'asc')
            ->first();

        return view('chapters.show', compact(
            'book',
            'chapter',
            'pages',
            'previousChapter',
            'nextChapter'
        ));
    }
    public function latest()
{
    $chapters = Chapter::with('book')
        ->orderBy('created_at', 'desc')
        ->take(12)
        ->get();

    return view('recentChapters', compact('chapters'));
}
}