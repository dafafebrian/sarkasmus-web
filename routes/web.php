<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// === ROUTE HALAMAN UTAMA ===
Route::get('/', [HomeController::class, 'index'])->name('home');

// === HALAMAN TENTANG ===
Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

// === HALAMAN ANALISIS ===
Route::get('/analyze', function () {
    return view('analyze');
})->name('analyze');

// === HALAMAN REGISTER (NANTI HANYA ADMIN) ===
Route::get('/register', function () {
    return view('register');
})->name('register');

// === HALAMAN POST ===
Route::get('/post', function () {
    return view('post');
})->name('post');

// === FEED POSTINGAN ===
Route::get('/feed', [PostController::class, 'feed'])->name('feed');
