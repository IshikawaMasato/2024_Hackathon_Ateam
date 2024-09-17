<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reports;
class viewpostcontroller extends Controller
{
    public function viewpost()
    {
        $items = reports::all();
        // var_dump($items);
        return view('viewpost',['items'=> $items]);

    }
    public function search(Request $request)
    {

    }
}

//　投稿閲覧


