<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tags;


class bulletincontroller extends Controller
{
    public function bulletin(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys = category::where('delete_flag', 0)->get();
        return view('components/bulletin',$image);
    }
}

// public function store(Request $request)
//     {
//         // ディレクトリ名を任意の名前で設定します
//         $dir = 'img';
//         // imgディレクトリを作成し画像を保存
//         // storage/app/public/任意のディレクトリ名/
//         $request->file('inputタグに付けられたname属性の値')->store('public/' . $dir);
//         // ページを更新します
//         return redirect('/');
//     }

// 掲示板投稿