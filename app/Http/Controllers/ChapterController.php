<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function show($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_id', $chapterId)
            ->firstOrFail();

        $pages = $chapter->pages;

        $previousChapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_number', '<', $chapter->chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

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

    // ✅ FIXED: latest should ONLY return latest chapters page
    public function latest()
    {
        $chapters = Chapter::with('book')
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        return view('recentChapters', compact('chapters'));
    }
}