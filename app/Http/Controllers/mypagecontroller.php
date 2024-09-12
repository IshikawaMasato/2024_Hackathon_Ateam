<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mypagecontroller extends Controller
{
    public function mypage(Request $request)
    {
        $items = Person::all();
        return view('mypage');
    }
    
}

//　マイページ