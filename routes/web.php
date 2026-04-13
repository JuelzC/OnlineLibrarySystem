<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/search', [BookController::class, 'index'])->name('search');

Route::post('/search', [BookController::class, 'search']);


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/random-book', [BookController::class, 'random'])->name('random.book');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register.form');
Route::post('/register', [RegisterController::class, 'accCreate'])->name('register');
