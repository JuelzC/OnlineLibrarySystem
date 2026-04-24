<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\AdminRequestController;
=======
use App\Http\Controllers\PagesController;
>>>>>>> 7a6245957a8949fcbeb936349767e2dbe59d8d07
use App\Http\Controllers\MangaRequestController;

Route::get('/', function () {
    return view('home');
});
<<<<<<< HEAD

=======
>>>>>>> 7a6245957a8949fcbeb936349767e2dbe59d8d07

Route::get('/request-manga', [MangaRequestController::class, 'index']);
Route::post('/request-manga', [MangaRequestController::class, 'store']);

Route::get('/search', [BookController::class, 'index'])->name('search');

Route::post('/search', [BookController::class, 'search']);


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/random-book', [BookController::class, 'random'])->name('random.book');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register.form');
Route::post('/register', [RegisterController::class, 'accCreate'])->name('register');

<<<<<<< HEAD
Route::get('/admin/requests', [AdminRequestController::class, 'index']);

Route::post('/admin/requests/approve/{id}', [AdminRequestController::class, 'approve']);

Route::post('/admin/requests/reject/{id}', [AdminRequestController::class, 'reject']);
=======
Route::get('/BlackJackVolume1Chapter1', function () {
    return app(PagesController::class)->showChapter(4); })->name('BlackJackVolume1Chapter1');


Route::get('/blackjack', function () {
    return view('BlackJack');
    })->name('blackjack.page');
>>>>>>> 7a6245957a8949fcbeb936349767e2dbe59d8d07
