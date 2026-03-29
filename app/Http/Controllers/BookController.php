<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('category')->get();
        $categories = Category::all();
        return view('books.index', compact('books', 'categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Membuat folder jika belum ada
            $path = public_path('images/books');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $imgName = time() . '.' . $request->gambar->extension();
            $request->gambar->move($path, $imgName);
            $data['gambar'] = $imgName;
        }

        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambah');
    }
}