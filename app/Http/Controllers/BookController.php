<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function welcome(){
        return view('welcome');
    }   
    
    public function index(Request $request){
        if($request->has('search')){
            $books = Book::where('title', 'like', "%$request->search%")
            ->paginate(10);
            
            return view('books.index') -> with(['books' => $books]);
        }

        $books = Book::paginate(10);
        return view('books.index') -> with(['books' => $books]);
    }

    public function show($book_id){
        $book = Book::find($book_id);

        return view('books.show') -> with(['book' => $book]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->save();
        return redirect()->route('books.show', $book->id);
    }

    public function edit($book_id){
        $book = Book::find($book_id);
        return view('books.edit') -> with(['book' => $book]);
    }

    public function update(Request $request){
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        $book = Book::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books.show', $book->id);
        
    }

    public function destroy(Request $request){
        $book = Book::find($request->id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
