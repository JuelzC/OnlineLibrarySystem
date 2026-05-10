<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Book::all();
        return view('home', compact('featured'));
    }
    public function newManga()
    {
        $newManga = Book::latest()->take(12)->get();

        return view('NewManga', compact('newManga'));
    }
}