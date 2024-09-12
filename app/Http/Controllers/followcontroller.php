<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class followcontroller extends Controller
{
    public function follow(Request $request)
    {
        $items = Person::all();
        return view('follow');
    }
}

//　フォロー欄



