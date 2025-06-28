<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class UserController extends Controller
{
    public static function Index(string  $show) : View {
        return view('user', ['show'=>$show]);
}
}
