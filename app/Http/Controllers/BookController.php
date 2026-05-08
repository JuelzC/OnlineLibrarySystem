<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;

class BookController extends Controller
{

    public function index()
    {
        $genres = Genre::all();

        $books = Book::with('genres')->get();

        return view('Search', compact('books','genres'));
    }

    public function search(Request $request)
    {

        $query = Book::with('genres');

        if($request->title){
            $query->where('title','LIKE','%'.$request->title.'%');
        }

        if($request->genres){

            $query->whereHas('genres', function($q) use ($request){
                $q->whereIn('genre_id',$request->genres);
            });

        }

        $books = $query->get();

        $genres = Genre::all();

        return view('Search', compact('books','genres'));

    }

    // ADD THIS
    public function show($id)
    {
        $book = Book::findOrFail($id);

        $chapters = Chapter::where('book_id', $id)
            ->orderBy('chapter_number')
            ->get();

        return view('manga.show', compact('book', 'chapters'));
    }

}