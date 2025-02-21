<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Sửa lỗi route categories
Route::prefix('categories')->group(function () {
    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
});
