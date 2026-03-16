<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('home');
});

Route::get('/search', [BookController::class, 'index']);

Route::post('/search', [BookController::class, 'search']);