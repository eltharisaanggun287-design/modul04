<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Menampilkan daftar buku
     */
    public function index()
    {
        // Mengambil semua data buku beserta kategorinya
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Menampilkan form tambah buku
     */
    public function create()
{
    // Mengambil semua data kategori dari database
    $categories = \App\Models\Category::all(); 

    // Mengirim data kategori ke halaman tambah buku
    return view('books.create', compact('categories'));
}
    /**
     * Menyimpan data buku baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'stok' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Proses upload gambar ke folder storage/app/public/books
        $path = $request->file('gambar')->store('books', 'public');

        // 3. Simpan data ke tabel books
        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
            'gambar' => $path,
        ]);

        // 4. Redirect kembali ke halaman daftar buku
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit buku
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Memperbarui data buku
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|integer',
            'stok' => 'required|integer',
            'category_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update data teks
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->stok = $request->stok;
        $book->category_id = $request->category_id;

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            Storage::disk('public')->delete($book->gambar);
            
            // Upload gambar baru
            $path = $request->file('gambar')->store('books', 'public');
            $book->gambar = $path;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Menghapus buku
     */
    public function destroy(Book $book)
    {
        // Hapus file gambar dari folder storage
        Storage::disk('public')->delete($book->gambar);
        
        // Hapus data dari database
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}