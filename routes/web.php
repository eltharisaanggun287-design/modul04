<?php // <-- WAJIB ADA DI BARIS PALING ATAS

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

// Halaman Home Utama
Route::get('/', function () { 
    return view('home'); 
});

// Route untuk Kategori dan Buku
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);