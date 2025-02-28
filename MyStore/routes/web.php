<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menus.index');

    Route::get('create', [MenuController::class, 'create'])->name('menus.create');

    Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');
    Route::post('update/{id}', [MenuController::class, 'update'])->name('menus.update');

    Route::get('delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');

    Route::post('store', [MenuController::class, 'store'])->name('menus.store');

});




Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');

    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
});
