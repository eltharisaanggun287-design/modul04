<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Book::insert([
            [
                'category_id' => 1, // Mengacu pada 'Teknologi'
                'judul' => 'Laravel Dasar',
                'penulis' => 'Taylor',
                'tahun_terbit' => 2024,
                'stok' => 5
            ],
            [
                'category_id' => 2, // Mengacu pada 'Sains'
                'judul' => 'Fisika Modern',
                'penulis' => 'Einstein',
                'tahun_terbit' => 2020,
                'stok' => 3
            ],
        ]);
    }
}