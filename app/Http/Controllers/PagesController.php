<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends Controller
{
    public function showChapter($chapter_id)
    {
        $pages = Page::where('chapter_id', $chapter_id)
            ->orderBy('page_number')
            ->get();

        return view('BlackJackVolume1Chapter1', compact('pages'));
    }
}