<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = Book::query();

    if ($request->title) {
        $query->where('title', 'LIKE', '%' . $request->title . '%');
    }

    $books = $query->get();

    return view('search', compact('books'));
}
}
