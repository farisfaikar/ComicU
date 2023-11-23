<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{category}', [categoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/search', [CategoryController::class,'search'])->name('category.search');
    Route::get('/comic', [ComicController::class, 'index'])->name('comic.index');
    Route::put('/comic/update/{comic}', [ComicController::class,'update'])->name('comic.update');
    Route::post('/comic/store', [ComicController::class, 'store'])->name('comic.store');
    Route::get('/comic/create', [ComicController::class, 'create'])->name('comic.create');
    Route::delete('/comic/delete/{id}', [ComicController::class, 'destroy'])->name('comic.destroy');
    Route::get('/comic/{id}/edit', [ComicController::class,'edit'])->name('comic.edit');
    Route::get('/comic/search', [ComicController::class,'search'])->name('comic.search');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::get('/review/search', [ReviewController::class,'search'])->name('review.search');
    Route::put('/review/update/{review}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

require __DIR__.'/auth.php';
