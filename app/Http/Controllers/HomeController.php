<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Method that handles the home page
    public function index()
    {
        return view('home'); // This points to resources/views/home.blade.php
    }
}