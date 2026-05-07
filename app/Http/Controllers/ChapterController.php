<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;

class ChapterController extends Controller
{
    public function show($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::findOrFail($chapterId);

        $pages = Page::where('chapter_id', $chapterId)
            ->orderBy('page_number')
            ->get();

        return view(
            'chapters.show',
            compact('book', 'chapter', 'pages')
        );
    }
}