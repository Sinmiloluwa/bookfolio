<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\RoleController;

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

Route::middleware(['middleware' => 'backHistory'])->group(function (){
    Auth::routes();
});




Route::group([ 'middleware' => 'backHistory'], function () {
Route::get('/home', [App\Http\Controllers\BookController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'discover'])->name('books.discover');
Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'view'])->name('books.view');
});
Route::group(['prefix'  =>  'admin', 'middleware' => 'isAdmin','auth','backHistory'], function () {
	Route::get('/my-home', [App\Http\Controllers\HomeController::class, 'myHome'])->name('admin.myHome');
    Route::get('/my-users', [App\Http\Controllers\HomeController::class, 'myUsers']);
    Route::get('/books', [App\Http\Controllers\BookController::class, 'allBooks'])->name('admin.books');
    Route::get('/books/show/{bookId}', [App\Http\Controllers\BookController::class, 'show'])->name('admin.show');
    Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'edit'])->name('admin.edit');
    Route::post('/books/update/{bookId}',[App\Http\Controllers\BookController::class, 'update']);
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
});

Route::group(['prefix' => 'writer', 'middleware' => 'writer'], function() {
    Route::get('/dashboard', [App\Http\Controllers\seller\WriterController::class, 'index'])->name('writer.dashboard');
});
