<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggle(Book $book)
{
    $user = Users::find(Auth::id());

    $exists = $user->bookmarks()
        ->where('bookmarks.book_id', $book->book_id)
        ->exists();

    if ($exists) {
        $user->bookmarks()->detach($book->book_id);
    } else {
        $user->bookmarks()->attach($book->book_id);
    }

    return back();
}
}