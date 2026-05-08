<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MangaRequestController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AddFavorite;   
use App\Http\Controllers\UploadMangaController;
use App\Http\Controllers\AdminHomePage;
use App\Http\Controllers\FeaturedManga;
use App\Http\Controllers\ChapterController;


Route::get('/', [HomeController::class, 'index']);
Route::post('/add-favorite', [AddFavorite::class, 'addFavorite'])->name('favorites.add');
Route::get('/admin/upload-manga', [UploadMangaController::class, 'uploadManga'])->name('upload-manga');
Route::post('/admin/upload-manga', [UploadMangaController::class, 'uploadManga'])
    ->name('upload-manga');

Route::get('/user-profile', [UserProfileController::class, 'userProfile'])->name('user-profile');
Route::get('/request-manga', [MangaRequestController::class, 'index']);
Route::post('/request-manga', [MangaRequestController::class, 'store']);

Route::get('/search', [BookController::class, 'index'])->name('search');

Route::post('/search', [BookController::class, 'search']);
Route::get('/admin/homepage', [AdminHomePage::class, 'show'])->name('admin');


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/random-book', [BookController::class, 'random'])->name('random.book');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register.form');
Route::post('/register', [RegisterController::class, 'accCreate'])->name('register');

Route::get('/admin/requests', [AdminRequestController::class, 'index']);

Route::post('/admin/requests/approve/{id}', [AdminRequestController::class, 'approve']);

Route::post('/admin/requests/reject/{id}', [AdminRequestController::class, 'reject']);

Route::get('/BlackJackVolume1Chapter1', function () {
    return app(PagesController::class)->showChapter(1); })->name('BlackJackVolume1Chapter1');


Route::get('/blackjack', function () {
    return view('BlackJack');
    })->name('blackjack.page');

Route::get('/admin/signup', [AdminAuthController::class, 'showSignup'])
    ->name('admin.signup');

Route::post('/admin/signup', [AdminAuthController::class, 'signup'])
    ->name('admin.signup.submit');

Route::get('/admin/requests', [AdminRequestController::class, 'index'])
    ->name('admin.requests');

    Route::get('/featured', [FeaturedManga::class, 'featured'])->name('featured');


    Route::get('/manga/{id}', [BookController::class, 'show'])
    ->name('manga.show');

Route::get('/manga/{book}/chapter/{chapter}', [ChapterController::class, 'show'])
    ->name('chapters.show');

    Route::get('/admin/homepage', [AdminHomePage::class, 'show'])->name('admin.homepage');
    Route::get('/admin/featured', [FeaturedManga::class, 'featured'])->name('admin.featured');
    Route::get('admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');