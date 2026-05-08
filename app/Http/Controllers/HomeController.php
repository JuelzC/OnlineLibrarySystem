<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Book::all();
        return view('home', compact('featured'));
    }
}