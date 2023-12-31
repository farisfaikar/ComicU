<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderController;

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
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/comic/detail/{id}', [HomeController::class, 'detail'])->name('comic.detail');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::delete('/transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::put('/transaction/update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::get('/transaction/search', [TransactionController::class,'search'])->name('transaction.search');
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
    Route::get('comic/export/excel', [ComicController::class, 'exportExcel'])->name('export-comic');
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
    Route::get('/users/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/order/{id}', [OrderController::class, 'order'])->name('order');
    Route::get('/test', [OrderController::class, 'index']);
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Untuk menampilkan komentar
    Route::get('/comic.detail/{id}/comments', 'CommentController@index')->name('comment.index');

    // Untuk menyimpan komentar
    Route::post('/comic.detail/{id}/comments', 'CommentController@store')->name('comment.store');
    
});

// Detail Comic
Route::get('comic.detail-comic', [HomeController::class, 'comic.detail-comic']);


/*----------------------------------------------
Google
----------------------------------------------*/
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google-login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google-callback');

require __DIR__.'/auth.php';
