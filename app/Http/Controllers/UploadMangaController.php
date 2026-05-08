<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class UploadMangaController extends Controller
{
    public function uploadManga(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the request
            $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'chapter_number' => 'required|integer',
                'pages' => 'required|array',
                'pages.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Find or create book
            $coverImagePath = null;
            if ($request->hasFile('cover_image')) {
                $coverImagePath = $request->file('cover_image')->store('covers', 'public');
            }

            $book = Book::updateOrCreate([
                'title' => $request->title,
                'author' => $request->author,
            ], [
                'description' => $request->description,
                'cover_image' => $coverImagePath,
            ]);

            $chapter = Chapter::create([
                'book_id' => $book->book_id,
                'chapter_number' => $request->chapter_number,
                'title' => $request->chapter_title,
            ]);

            $pageNumber = 1;
            foreach ($request->file('pages') as $file) {
                $path = $file->store('images', 'public');
                Page::create([
                    'chapter_id' => $chapter->chapter_id,
                    'page_number' => $pageNumber,
                    'image' => $path,
                ]);
                $pageNumber++;
            }

            return redirect()->back()->with('success', 'Chapter uploaded successfully.');
        }

        return view('admin_upload_form');
    }
}
