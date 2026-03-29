<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // WAJIB: Agar bisa mengambil data kategori
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Menampilkan daftar buku
    public function index()
    {
        $books = Book::all();
        $categories = Category::all(); // Mengambil data kategori agar tidak "Undefined" di View

        // Kirim kedua variabel ke view
        return view('books.index', compact('books', 'categories'));
    }

    // 2. Menampilkan form tambah buku
    public function create()
    {
        $categories = Category::all(); // Dibutuhkan jika ada pilihan kategori di form
        return view('books.create', compact('categories'));
    }

    // 3. Menyimpan data buku
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul'        => 'required',
            'penulis'      => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required|numeric',
        ]);

        // Simpan ke database
        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Buku berhasil disimpan!');
    }

    // 4. Menghapus buku (Lengkap untuk CRUD)
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}