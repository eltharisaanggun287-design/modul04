<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok'
    ];

    // Relasi: Buku adalah milik 1 Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
