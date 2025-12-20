<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;

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
Route::get('/feed', [MemeController::class, 'index'])->name('feed');

// === MEME ROUTES ===
Route::get('/meme/create', [MemeController::class, 'create'])->name('meme.create');
Route::post('/meme', [MemeController::class, 'store'])->name('meme.store');
// Allow like and comment without auth (anonymous)
Route::post('/meme/{meme}/like', [MemeController::class, 'toggleLike'])->name('meme.like');
Route::post('/meme/{meme}/comment', [MemeController::class, 'addComment'])->name('meme.comment');

Route::middleware('auth')->group(function () {
    Route::delete('/meme/{meme}', [MemeController::class, 'destroy'])->name('meme.destroy');
    Route::delete('/comment/{comment}', [MemeController::class, 'deleteComment'])->name('comment.destroy');
});

// === AUTH ROUTES UNTUK USER BIASA ===
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// === ADMIN AUTH ROUTES ===
Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');