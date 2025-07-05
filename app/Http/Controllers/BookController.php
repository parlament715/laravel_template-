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
        $validated = collect($request->validate([
            'title' => 'required|string|unique:books,title|max:255',
            'author' => 'required|string|max:255',
            "published_at" => "required|date"
        ], [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.unique' => 'Книга с таким названием уже существует.',
            'author.required' => 'Пожалуйста, укажите автора.',
            'published_at.required' => 'Дата публикации обязательна.',
            'published_at.date' => 'Введите корректную дату.',
        ]));
        Book::create($validated->only(["title","author","published_at"])->toArray());
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = collect($request->validate([
            'title' => 'required|string|unique:books,title|max:255',
            'author' => 'required|string|max:255',
            "published_at" => "required|date"
        ], [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.unique' => 'Книга с таким названием уже существует.',
            'author.required' => 'Пожалуйста, укажите автора.',
            'published_at.required' => 'Дата публикации обязательна.',
            'published_at.date' => 'Введите корректную дату.',
        ]));
        $book->update($validated->only(['title', 'author', "published_at"])->toArray());

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
