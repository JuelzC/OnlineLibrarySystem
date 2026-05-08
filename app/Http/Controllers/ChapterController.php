<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;

class ChapterController extends Controller
{
    public function show($book, $chapter)
    {
        // Book
        $book = Book::findOrFail($book);

        // Current chapter
        $chapter = Chapter::findOrFail($chapter);

        // Pages
        $pages = Page::where('chapter_id', $chapter->chapter_id)
            ->orderBy('page_number')
            ->get();

        // Previous chapter
        $previousChapter = Chapter::where('book_id', $book->book_id)
            ->where('chapter_number', '<', $chapter->chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

        // Next chapter
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
}