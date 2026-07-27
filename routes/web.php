<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\BlogController;


// ===== HOME =====
Route::get('/', function () {
    return view('home');
})->name('home');

// ===== BLOG ROUTES =====
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{tag}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

// Comment (auth required)
Route::post('/blog/{id}/comment', [BlogController::class, 'comment'])
    ->name('blog.comment')
    ->middleware('auth');

// Atau jika tidak pakai auth, cukup redirect ke home
Route::get('/login', function() {
    return redirect('/');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ===== ABOUT & CONTACT =====
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// ===== TRACKING =====
Route::post('/tracking', [TrackingController::class, 'search'])->name('tracking.search');

Route::get('/tracking/{awb}', [TrackingController::class, 'show'])->name('tracking.show');
Route::get('/tracking', [TrackingController::class, 'show'])->name('tracking.show');
