<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Ramsey\Collection\Collection;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("table", ["books" => $books]);
    }

}
