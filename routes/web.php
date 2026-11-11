<?php

use App\Http\Controllers\kategoricontroller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalKategori = Category::count();
    return view('dashboard', compact('totalKategori'));
})->name('dashboard');

Route::resource('categories', kategoricontroller::class)->parameters([
    'categories' => 'category',
]);
