<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/', function () {
    return redirect()->route('login'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::prefix('product')->group(function () {
        Route::get('/', [productController::class, 'index'])->name('product.index');
        Route::get('/create', [productController::class, 'create'])->name('product.create');
        Route::post('/', [productController::class, 'store'])->name('product.store');
        Route::get('/{product}/edit', [productController::class, 'edit'])->name('product.edit');
        Route::put('/{product}', [productController::class, 'update'])->name('product.update');
        Route::delete('/{product}', [productController::class, 'destroy'])->name('product.destroy');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
