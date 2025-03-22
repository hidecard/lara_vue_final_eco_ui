<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route; 

require base_path('routes/adminRoute.php');
require base_path('routes/profileRoute.php');

// General routes
Route::get('/category-list', [IndexController::class, 'categoryList'])->name('category.list');
Route::post('/search', [IndexController::class, 'search'])->name('search');

// Views general
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/category/{categorySlug}', [CategoryController::class, 'categoryView'])->name('category.view');
Route::get('/{categorySlug}/product/{productSlug}', [ProductController::class, 'productView'])->name('product.view');
Route::inertia('/cart', 'Frontend/ConfirmCart')->name('cartPage');
