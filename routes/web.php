<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'discover'])->name('books.discover');
Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'view'])->name('books.view');
Route::group(['prefix'  =>  'admin'], function () {
	Route::get('/my-home', [App\Http\Controllers\HomeController::class, 'myHome']);
    Route::get('/my-users', [App\Http\Controllers\HomeController::class, 'myUsers']);
    Route::get('/books', [App\Http\Controllers\BookController::class, 'allBooks'])->name('admin.books');
    Route::get('/books/show/{bookId}', [App\Http\Controllers\BookController::class, 'show'])->name('admin.show');
    Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'edit'])->name('admin.edit');
});
