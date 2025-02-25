<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('categories')->group(function () {
    // Changed to not require {id} parameter since it’s a list
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');

    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
});
