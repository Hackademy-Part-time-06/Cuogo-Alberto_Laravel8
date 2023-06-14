<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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

// Route::get('/books', [BookController::class, 'index'])->name('books.index');
// Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('auth');
// Route::post('/books/save', [BookController::class, 'store'])->name('books.store');
// Route::get('/books/{book}/detail', [BookController::class, 'show'])->name('books.show');

// Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
// Route::put('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
// Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Route::resource('books', BookController::class, [
//   'names' => [
//     'index' => 'books.index',
//     'create' => 'books.create',
//     'store' => 'books.store',
//     'show' => 'books.show',
//     'edit' => 'books.edit',
//     'update' => 'books.update',
//     'destroy' => 'books.destroy',
//   ]
// ]);

Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::get('/profile/{user_id}', [PageController::class, 'show'])->name('users.show');
Route::get('/profile/{user_id}/edit', [PageController::class, 'edit'])->name('users.edit');
Route::put('/profile/{user_id}/update', [PageController::class, 'update'])->name('users.update');


Route::resource('books', BookController::class);

Route::resource('authors', AuthorController::class);

Route::resource('categories', CategoryController::class);


