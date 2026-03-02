<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void
{
    // Gunakan 'create', BUKAN 'table'
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh kolom nama kategori
        $table->text('deskripsi')->nullable(); // Kolom deskripsi yang mau kamu buat
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColoumn('deskripsi');
        });
    }
};
