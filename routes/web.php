<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// 1. Menampilkan daftar semua buku (URL: localhost:8000/books) - INI YANG TADI ERROR
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// 2. Menampilkan form tambah buku (URL: localhost:8000/books/create)
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// 3. Proses menyimpan data (Metode POST)
Route::post('/books', [BookController::class, 'store'])->name('books.store');