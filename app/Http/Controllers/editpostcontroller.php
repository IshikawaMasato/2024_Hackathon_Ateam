<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editpostcontroller extends Controller
{
    public function editpost(Request $request)
    {
        $items = Person::all();
        return view('editpost');
    }
}

//　掲示板投稿編集