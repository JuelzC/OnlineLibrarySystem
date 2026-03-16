<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function random()
    {
        $randomBook = Book::with('genres')->inRandomOrder()->first();

        return view('random-book', compact('randomBook'));
    }
}