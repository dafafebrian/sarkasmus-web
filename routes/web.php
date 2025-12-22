<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;


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
Route::middleware('auth')->group(function () {
    Route::get('/meme/create', [MemeController::class, 'create'])->name('meme.create');
    Route::post('/meme', [MemeController::class, 'store'])->name('meme.store');
    Route::delete('/meme/{meme}', [MemeController::class, 'destroy'])->name('meme.destroy');
    Route::post('/meme/{meme}/like', [MemeController::class, 'toggleLike'])->name('meme.like');
    Route::post('/meme/{meme}/comment', [MemeController::class, 'addComment'])->name('meme.comment');
    Route::delete('/comment/{comment}', [MemeController::class, 'deleteComment'])->name('comment.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// === AUTH ROUTES UNTUK USER BIASA ===
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// === ROUTES KHUSUS USER YANG SUDAH LOGIN ===
Route::middleware('auth')->group(function () {
    // INI RUTE YANG HILANG DAN MENYEBABKAN ERROR
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.dashboard');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Rute tambahan untuk interaksi meme (opsional jika sudah ada di atas)
    Route::delete('/meme/{meme}', [MemeController::class, 'destroy'])->name('meme.destroy');
});

// === ADMIN AUTH ROUTES ===
Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// === ADMIN DASHBOARD (MENGGUNAKAN MIDDLEWARE ADMIN) ===
Route::middleware(\App\Http\Middleware\AdminMiddleware2::class)->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/meme/{id}/approve', [AdminDashboardController::class, 'approve'])->name('admin.meme.approve');
    Route::post('/meme/{id}/reject', [AdminDashboardController::class, 'reject'])->name('admin.meme.reject');
});