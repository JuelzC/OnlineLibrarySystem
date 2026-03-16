<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Random book page
Route::get('/random-book', [BookController::class, 'random'])->name('random.book');

// Login page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Registration routes
Route::get('/register', [RegisterController::class, 'register'])->name('register.form');
Route::post('/register', [RegisterController::class, 'accCreate'])->name('register');