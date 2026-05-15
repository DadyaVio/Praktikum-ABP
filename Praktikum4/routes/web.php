<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Redirect ke halaman produk
Route::get('/', function () {
    return redirect('/products');
});

// Dashboard (UPDATED - pakai data produk)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalProduk' => Product::count(),
        'totalStock' => Product::sum('stock'),
        'totalNilai' => Product::sum('price'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route produk (CRUD)
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);

    // Profile (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth Breeze
require __DIR__.'/auth.php';