<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index() {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }

    public function create() {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request) {
        $path_image = '';

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path_name = $request->file('img')->getClientOriginalName();
            $path_image = $request->file('img')->storeAs('public/images/cover', $path_name);
        }

        // $request -> validate([
        //     'title' => 'required|string',
        //     'author' => 'required|string',
        //     'pages' => 'required|numeric',
        //     'year' => 'required|numeric'
        // ]);

        Book::create([
            'title' =>$request->title,
            'img' =>$path_image,
            'author_id' =>$request->author_id,
            'pages' =>$request->pages,
            'year' =>$request->year
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book successfully added!');
    }

    public function show(Book $book) {
        // $mybook = Book::find($book);

        // if (is_null($mybook)) {
        //     abort(404);
        // }

        //$mybook = Book::findOrFail($book);

        //return view('show', ['book' => $book]);
        $authors = Author::all();
        return view('books.show', ['book' => $book, 'authors' => $authors]);
    }

    public function edit(Book $book) {
        $authors = Author::all();
        return view('books.edit', ['book' => $book, 'authors' => $authors]);
    }

    public function update(BookRequest $request, Book $book) {
        $path_image = $book->img;

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path_name = $request->file('img')->getClientOriginalName();
            $path_image = $request->file('img')->storeAs('public/images/cover', $path_name);
        }

        $book->update([
            'title' =>$request->title,
            'img' =>$path_image,
            'author_id' =>$request->author_id,
            'pages' =>$request->pages,
            'year' =>$request->year
        ]);
        return redirect()->route('books.index')
            ->with('edit', 'Book edited successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with('delete', 'Book deleted successfully!');
    }
}
