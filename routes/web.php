<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\kategoricontroller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalKategori = Category::count();
    $totalBarang = Item::count();

    return view('dashboard', compact('totalKategori', 'totalBarang'));
})->name('dashboard');

Route::resource('categories', kategoricontroller::class)->parameters([
    'categories' => 'category',
]);

Route::resource('items', ItemController::class);
