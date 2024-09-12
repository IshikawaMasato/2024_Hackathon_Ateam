<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class viewpostcontroller extends Controller
{
    public function viewpost(Request $request)
    {
        $items = Person::all();
        return view('viewpost');
    }
}

//　投稿閲覧


