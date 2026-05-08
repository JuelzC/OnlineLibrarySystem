<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddFavorite extends Controller
{
    public function addFavorite(Request $request)
    {
        return back()->with('Added to favorites');
    }
}
