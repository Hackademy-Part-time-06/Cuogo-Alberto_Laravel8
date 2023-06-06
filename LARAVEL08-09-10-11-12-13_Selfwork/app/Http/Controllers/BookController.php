<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }

    public function create() {
        return view('books.create');
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
            'author' =>$request->author,
            'pages' =>$request->pages,
            'year' =>$request->year
        ]);

        return redirect()->route('books.index')->with('success', 'Book successfully added!');
    }

    public function show(Book $book) {
        // $mybook = Book::find($book);

        // if (is_null($mybook)) {
        //     abort(404);
        // }

        //$mybook = Book::findOrFail($book);

        //return view('show', ['book' => $book]);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book) {
        return view('books.edit', compact('book'));
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
            'author' =>$request->author,
            'pages' =>$request->pages,
            'year' =>$request->year
        ]);
        return redirect()->route('books.index')
            ->with('success', 'Book edited successfully!');
    }
}
