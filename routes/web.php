<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/analyze', function () {
    return view('analyze');
});


Route::get('/register', function () {
    return view('register'); 
})->name('register'); 


// Pastikan baris ini ada di routes/web.php
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');

Route::get('/post', function () {
    return view('post');
});
