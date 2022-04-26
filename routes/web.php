<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Writer\WriterController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\Writer;
use phpDocumentor\Reflection\Types\Resource_;

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


Route::get('/pg', [App\Http\Controllers\BookController::class, 'pg']);

Route::group([ 'middleware' => 'backHistory'], function () {
Route::get('/home', [App\Http\Controllers\BookController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/books/discover', [App\Http\Controllers\BookController::class, 'discover'])->name('books.discover');
Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'view'])->name('books.view');
Route::get('/book/search', [App\Http\Controllers\BookController::class, 'searchBook'])->name('book.search');
});

Route::get('/writer/register', [App\Http\Controllers\Writer\WriterController::class, 'register'])->name('writer.register');
Route::post('/writer/newWriter', [App\Http\Controllers\Writer\WriterController::class, 'newWriter'])->name('writer.newWriter');

Route::group(['prefix'  =>  'admin', 'middleware' => 'isAdmin','auth','backHistory'], function () {
	Route::get('/my-home', [App\Http\Controllers\HomeController::class, 'myHome'])->name('admin.myHome');
    Route::get('/my-users', [App\Http\Controllers\HomeController::class, 'myUsers']);
    Route::get('/books', [App\Http\Controllers\BookController::class, 'allBooks'])->name('books.index');
    Route::get('/books/show/{bookId}', [App\Http\Controllers\BookController::class, 'show'])->name('admin.show');
    Route::get('/books/{bookId}', [App\Http\Controllers\BookController::class, 'edit'])->name('admin.edit');
    Route::post('/books/update/{bookId}',[App\Http\Controllers\BookController::class, 'update']);
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
    Route::get('/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::post('/roles/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
    Route::post('/roles/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
    Route::post('/roles/store/', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::get('/roles/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('role.show');
    Route::get('/writers', [App\Http\Controllers\Writer\WriterController::class, 'all'])->name('writer.all');
    Route::get('/writers/unverified', [App\Http\Controllers\Writer\WriterController::class, 'unverified'])->name('writer.unverified');
    Route::get('/writers/unverified/show/{id}', [App\Http\Controllers\Writer\WriterController::class, 'unverifiedShow'])->name('writer.unverifiedShow');
    Route::post('writers/verify/{id}',  [App\Http\Controllers\Writer\WriterController::class, 'verify'])->name('writer.verify');
    Route::get('/writers/verified/show/{id}', [App\Http\Controllers\Writer\WriterController::class, 'verifiedShow'])->name('writer.verifiedShow');
    Route::post('/writer/destroy/{id}', [App\Http\Controllers\Writer\WriterController::class, 'delete'])->name('writer.delete');
    Route::post('writers/deny/{id}',  [App\Http\Controllers\Writer\WriterController::class, 'deny'])->name('writer.deny');
});

Route::group(['middleware' => 'writer'], function() {
    Route::resource('writer', WriterController::class);
    Route::post('writer/update/{id}', [WriterController::class, 'update'])->name('writer.update');
    Route::get('/books', [App\Http\Controllers\Writer\WriterController::class, 'books'])->name('writer.books');
    Route::post('/book/destroy/{id}', [App\Http\Controllers\Writer\WriterController::class, 'destroy'])->name('writer.destroy');
    Route::get('/notyetverified', function() {
        return view('writer.notYetVerified');
    });
    Route::get('writer/dashboard', [App\Http\Controllers\Writer\WriterController::class, 'dashboard'])->name('writer.dashboard');
});
