<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function post(Request $request)
    {
        $items = Person::all();
        return view('post');
    }
}


// 掲示板投稿