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




Route::get('/post', function () {
    return view('post');
});

Route::get('/feed', [PostController::class, 'feed']);
