<?php

use App\Http\Controllers\BookController;
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

Route::redirect('/', '/books', 301);

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/books/save', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}/detail', [BookController::class, 'show'])->name('books.show');

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


