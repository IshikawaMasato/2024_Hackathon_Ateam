<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class registrationcontroller extends Controller
{
    public function registration(Request $request)
    {
        $items = Person::all();
        return view('register');
    }
}

//　新規登録
