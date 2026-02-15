<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = ['nama_kategori', 'deskripsi'];

    // Relasi: 1 Kategori punya BANYAK Buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
