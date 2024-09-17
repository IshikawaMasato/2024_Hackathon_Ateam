<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountdeletecontroller extends Controller
{
    public function accountdelete(Request $request)
    {
        $items = Person::all();
        return view('accountdelete');
    }
}

//　アカウント削除


