<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reports;
use App\Models\tags;

class bulletincontroller extends Controller
{
    public function index()
    {
        $reports = reports::get();
        return view('auth.index', compact('reports'));
    }

    public function bulletin(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys= tags::where('delete_flag',0)->get();

        return view('auth.bulletin',['categorys'=>$categorys]);
    }

    public function store(Request $request)
    {
        $img = $request->file('img_path');
        if (isset($img)) {
            $path = $img->store('img', 'public');
            // DBに登録する処理
            if ($path) {
                // DBに登録する処理
                reports::create([
                    'img_path' => $path,
                ]);
            }
        }
        return redirect()->route('auth.index');
    }
}
