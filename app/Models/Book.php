<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Nama kolom yang ada di tabel database Anda
    protected $fillable = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
}