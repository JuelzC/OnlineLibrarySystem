<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MangaRequest;

class MangaRequestController extends Controller
{
    public function index()
    {
        return view('request-manga');
    }

    public function store(Request $request)
    {
        MangaRequest::create([
            'user_id' => null,
            'title' => $request->title,
            'mal_link' => $request->mal_link,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Manga request submitted!');
    }
}