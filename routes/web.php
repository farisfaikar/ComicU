<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/transaction', TransactionController::class);

Route::middleware('auth')->group(function () {
    Route::get('/comic', [ComicController::class, 'index'])->name('comic.index');
    Route::put('/comic/update/{comic}', [ComicController::class,'update'])->name('comic.update');
    Route::post('/comic/store', [ComicController::class, 'store'])->name('comic.store');
    Route::get('/comic/create', [ComicController::class, 'create'])->name('comic.create');
    Route::delete('/comic/{id}', [ComicController::class,'destroy'])->name('comic.destroy');
    Route::get('/comic/{id}', [ComicController::class,'edit'])->name('comic.edit');
    Route::patch('/comic/{id}', [ComicController::class,'update'])->name('comics.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{review}', [ReviewController::class, 'show'])->name('review.show');
    Route::get('/review/{review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{review}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

require __DIR__.'/auth.php';
