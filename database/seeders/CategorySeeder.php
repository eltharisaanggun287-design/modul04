<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Contoh data baru dengan deskripsi
        Category::insert([
            [
                'nama_kategori' => 'Sejarah',
                'deskripsi' => 'Buku-buku tentang sejarah dunia dan nasional',
            ],
            [
                'nama_kategori' => 'Komik',
                'deskripsi' => 'Buku bergambar untuk hiburan',
            ],
        ]);
    }
}