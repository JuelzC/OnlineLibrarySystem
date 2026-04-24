<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\MangaRequestController;

Route::get('/', function () {
    return view('home');
});


Route::get('/request-manga', [MangaRequestController::class, 'index']);
Route::post('/request-manga', [MangaRequestController::class, 'store']);

Route::get('/search', [BookController::class, 'index']);

Route::post('/search', [BookController::class, 'search']);


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/random-book', [BookController::class, 'random'])->name('random.book');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::get('/register', [RegisterController::class, 'register'])->name('register.form');
Route::post('/register', [RegisterController::class, 'accCreate'])->name('register');

Route::get('/admin/requests', [AdminRequestController::class, 'index']);

Route::post('/admin/requests/approve/{id}', [AdminRequestController::class, 'approve']);

Route::post('/admin/requests/reject/{id}', [AdminRequestController::class, 'reject']);
