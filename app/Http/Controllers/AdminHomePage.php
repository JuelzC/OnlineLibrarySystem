<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminHomePage extends Controller
{
    public function show()
    {
        $featured = Book::all();
        return view('admin_home', compact('featured'));
    }
}
