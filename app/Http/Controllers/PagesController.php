<?php

namespace App\Http\Controllers;

use App\Models\MangaPages;

class PagesController extends Controller
{
    public function showChapter($book_id)
    {
        $pages = MangaPages::where('book_id', $book_id)
            ->orderBy('page_number')
            ->get();

        return view('BlackJackVolume1Chapter1', compact('pages'));
    }
}