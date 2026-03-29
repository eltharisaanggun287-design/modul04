<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Ini harus sama persis dengan yang di migration
    protected $fillable = ['nama_kategori']; 
}