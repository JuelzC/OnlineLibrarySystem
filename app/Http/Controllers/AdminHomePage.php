<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomePage extends Controller
{
    public function show()
    {
        return view('admin_home');
    }
}
