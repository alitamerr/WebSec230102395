<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function calculator()
    {
        return view('calculator');
    }

    public function even()
    {
        return view('even');
    }

    public function multable()
    {
        return view('multable');
    }

    public function prime()
    {
        return view('prime');
    }

    public function transcript()
    {
        return view('transcript');
    }
}

