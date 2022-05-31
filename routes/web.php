<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
//
Route::get('/search', [GalleryController::class, 'search'])->name('search');
//
Route::get('book/{book}', [BookController::class, 'details'])->name('book.details');
Route::post('/book/{book}/rate', 'BooksController@rate')->name('book.rate');
//
Route::get('/categories', [CategoryController::class, 'list'])->name('gallery.categories.index');
Route::get('/categories/search', [CategoryController::class, 'search'])->name('gallery.categories.search');
Route::get('/categories/{category}', [CategoryController::class, 'result'])->name('gallery.categories.show');
//
Route::get('/authors', [AuthorController::class, 'list'])->name('gallery.authors.index');
Route::get('/authors/search', [AuthorController::class, 'search'])->name('gallery.authors.search');
Route::get('/authors/{author}', [AuthorController::class, 'result'])->name('gallery.authors.show');
//
Route::get('/publishers', [PublisherController::class, 'list'])->name('gallery.publishers.index');
Route::get('/publishers/search', [PublisherController::class, 'search'])->name('gallery.publishers.search');
Route::get('/publishers/{publisher}', [PublisherController::class, 'result'])->name('gallery.publishers.show');
//
Route::prefix('/admin')->middleware('can:update-books')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    //
    Route::resource('books', BookController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('users', UserController::class)->middleware('can:update-users');
});
//
Route::post('/book/{book}/rate', [Book::class, 'rate'])->name('book.rate');
