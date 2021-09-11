<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:book-list|book-create|book-edit|book-delete', ['only' => ['view']]);
        $this->middleware('permission:book-create', ['only' => ['create','store']]);
        $this->middleware('permission:book-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:book-delete', ['only' => ['destroy']]);
    }

    public function home()
    {   
        $books = Book::all();
        $featuredBooks = Book::orderBy('created_at', 'DESC')->paginate(3);
        return view('home',compact('books','featuredBooks'));
    }

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

    public function update(Request $request, $bookId)
    {
        $book = Book::find($bookId);

        if ($request->cover != '') {
            $path = public_path().'/uploads/images/';

            if ($book->book_cover != '' && $book->book_cover != null) {
                $file_old = $path.$book->book_cover;
                unlink($file_old);
            }

            $file = $request->cover;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            
        }

        $book->update([
            'name' => $request->name,
            'description' => $request->desc,
            'author' => $request->author,
            'book_cover' => $filename
        ]);

        $book->save();
        return redirect()->route('admin.books')->with('message', 'Book has been updated');

       

        
        
    }
}
