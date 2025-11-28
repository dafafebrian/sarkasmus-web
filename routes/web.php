<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminAuthController;

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

// === HALAMAN POST ===
Route::get('/post', function () {
    return view('post');
})->name('post');

// === FEED POSTINGAN ===
Route::get('/feed', [PostController::class, 'feed'])->name('feed');

Route::get('/admin/register', [AdminAuthController::class, 'showRegister']);

Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');

// proses login
Route::post('/login', [AdminAuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/admin/register', function () {
    return view('admin.register');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');

// PROSES LOGIN ADMIN
Route::post('/admin/login', [AdminAuthController::class, 'login']);