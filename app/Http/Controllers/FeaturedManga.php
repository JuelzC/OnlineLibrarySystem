<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturedManga extends Controller
{
    public function featured() {
        $featuredManga = \App\Models\Featured::all();
        return view('featured', ['featuredManga' => $featuredManga]);
    }
}
