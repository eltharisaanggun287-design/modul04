<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Fungsi baru untuk menampilkan daftar buku
    public function index()
    {
        $books = Book::all(); // Mengambil semua data buku
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'        => 'required',
            'penulis'      => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required|numeric',
        ]);

        Book::create($validatedData);

        // Setelah simpan, arahkan ke daftar buku (index) agar tidak error lagi
        return redirect()->route('books.index')->with('success', 'Buku berhasil disimpan!');
    }
}