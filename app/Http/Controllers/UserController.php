<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(string $show): View
    {
        return view('user', ['show' => $show]);
    }
}
