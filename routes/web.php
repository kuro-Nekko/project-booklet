<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Models\Books;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth', 'verified')->group(function () {
  Route::get('/', function () {
    return Inertia::render('Browse', [
      'laravelVersion' => Application::VERSION,
      'phpVersion' => PHP_VERSION,
    ]);
  });

  Route::get('/uploads', function () {
    return Inertia::render('Uploads');
  })->name('uploads');

  Route::get('/uploads/book', function () {
    return Inertia::render('Uploads/AddBook');
  })->name('uploads.addbook');

  Route::get('/uploads/book/{id}/chapter', function ($id) {
    return Inertia::render('Uploads/AddChapter', [
      'bookId' => $id
    ]);
  })->name('uploads.addchapter');


  Route::get('/favorites', function () {
    return Inertia::render('Favorites');
  })->name('favorites');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::controller(BooksController::class)->prefix('books')->group(function(){
    Route::get('', 'index')->name('books');
    Route::get('create', 'create')->name('books.create');
    Route::post('store', 'store')->name('books.store');
  });
});

require __DIR__ . '/auth.php';
