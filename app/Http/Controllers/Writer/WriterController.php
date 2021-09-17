<?php

namespace App\Http\Controllers\Writer;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mime\MimeTypes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('writer.dashboard');
    }

    public function register()
    {
        return view('writer.register');
    }

    public function newWriter(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'document' => 'required|mimes:pdf'
        ]);

        if ($request->document != '') {
            $path = public_path().'/uploads/images/verify';

            $file = $request->document;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
        }

        $role = Role::where('name','writer')->first();


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'document' => $filename
        ]);

     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole('writer');

        return view('writer.verify');

    }

    public function books()
    {
        $id = auth()->user()->id;
        $books = Book::where('user_id',$id)->get();
        return view('writer.books',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:jpg',
            'pdf' => 'required|mimes:pdf'
        ]);


        if ($request->cover != '' && $request->pdf != '') {
            $path = public_path().'/uploads/images/';

            $file = $request->cover;
            $pdf = $request->pdf;
            $pdfname = $pdf->getClientOriginalName();
            $filename = $file->getClientOriginalName();
            $pdf->move($path, $pdfname);
            $file->move($path, $filename);
        }

        $book = Book::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'book_cover' => $filename,
            'pdf' => $pdfname,
            'user_id' => auth()->user()->id,
            'release_date' => now()
        ]);


        return redirect()->route('writer.books')
                         ->with('success','Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id',$id)->first();
        return view('writer.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id)->first();
        return view('writer.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($request->cover != '') {
            $path = public_path().'/uploads/images/';

            if ($book->book_cover != '' && $book->book_cover != null) {
                $file_old = $path.$book->book_cover;
                unlink($file_old);
            }
            
        }
       

        if ($request->cover != '') {
            $file = $request->cover;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            $book->update([
                'name' => $request->name,
                'description' => $request->desc,
                'author' => $request->author,
                'book_cover' => $filename
            ]);
        }
        else {
            $book->update([
                'name' => $request->name,
                'description' => $request->desc,
                'author' => $request->author,
            ]);
        }

        

        $book->save();
        return redirect()->route('writer.books')->with('message', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("books")->where('id',$id)->delete();
        return redirect()->route('writer.books')
                        ->with('success','Book deleted successfully');
    }
}
