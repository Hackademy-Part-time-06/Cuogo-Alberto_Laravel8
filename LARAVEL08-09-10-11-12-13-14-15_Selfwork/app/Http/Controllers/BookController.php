<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index() {
        if (Auth::user()) {
            $books = Book::where('user_id', Auth::user()->id)->get();
        }
        else {
            $books = Book::all();
        }

        return view('books.index', ['books' => $books]);
    }

    public function create() {
        $authors = Author::all();
        $users = User::all();
        return view('books.create', ['authors' => $authors, 'users' => $users]);
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

        // Auth::user()->books()->create([
        //     'title' => $request->input('title'),
        //     'image' => $path_image,
        //     'author_id' => $request->author_id,
        //     'pages' => $request->pages,
        //     'year' => $request->year,
        // ]);

        $data = Book::create([
            'title' =>$request->title,
            'img' =>$path_image,
            'author_id' =>$request->author_id,
            'pages' =>$request->pages,
            'year' =>$request->year,
            'user_id' =>Auth::user()->id
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
        return view('books.show', compact('book'));
    }

    public function edit(Book $book) {
        if (!(Auth::user()->id == $book->user_id)) {
            abort(401);
        }

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
