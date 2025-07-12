<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(BookCreateRequest $request)
    {
        Book::create($request->only(["title","author","published_at"])->toArray());
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->update($request->only(['title', 'author', "published_at"])->toArray());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function index()
    {
        return view("books.index", ["books" => Book::paginate(10)]);
    }

}
