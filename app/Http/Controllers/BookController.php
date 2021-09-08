<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $featuredBooks = Book::orderBy('created_at', 'DESC')->paginate(3);
        return view('home', compact('books','featuredBooks'));
    }

    public function discover()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function view(Book $bookId)
    {
        $book = Book::find($bookId)->first();
        return view('books.view', compact('book'));
        
    }
    
    public function allBooks()
    {
        $allBooks = Book::paginate(10);
        $newBooks = Book::orderBy('created_at','DESC')->get();
        return view('admin.books',compact('allBooks','newBooks'));
    }

    public function show(Book $bookId)
    {
        $book = Book::find($bookId)->first();
        return view('admin.show',compact('book'));
    }

    public function edit(Book $bookId)
    {
        $book = Book::find($bookId)->first();
        return view('admin.edit',compact('book'));
    }
}
