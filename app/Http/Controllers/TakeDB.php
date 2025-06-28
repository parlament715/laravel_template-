<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class TakeDB extends Controller
{
    public function index()
    {
        $books = Book::all()->map(function($book) {
            $book->title = "?" . $book->title . "?";
            return $book;
        });
        return view("table",["books"=>$books]);
    }

}
