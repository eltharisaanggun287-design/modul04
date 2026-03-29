<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book; // Tambahkan ini
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::all(); // Tambahkan ini agar variabel $books terdefinisi
        
        return view('categories.index', compact('categories', 'books'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
        }

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'image' => $imageName,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category berhasil ditambahkan');
    }
}