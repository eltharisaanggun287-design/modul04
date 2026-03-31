<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController; // 1. PASTIKAN ADA BARIS INI

Route::get('/', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('books', BookController::class);
    
    // 2. TAMBAHKAN BARIS INI AGAR CATEGORIES.INDEX DIKENALI
    Route::resource('categories', CategoryController::class); 
 
});