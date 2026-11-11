<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Hapus tanda '//' di bawah ini HANYA JIKA nama tabel di database Anda adalah 'kategori'
    // protected $table = 'kategori';

    protected $fillable = [
        'name',
    ];
}
