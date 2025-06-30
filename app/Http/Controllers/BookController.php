<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Ramsey\Collection\Collection;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "published_at" => $request->published_at,
        ]);
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->only(['title', 'author']));
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
    public function index()
    {
        $books = Book::paginate(10);
        return view("books.index", ["books" => $books]);
    }

}
