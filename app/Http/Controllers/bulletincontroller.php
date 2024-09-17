<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bulletincontroller extends Controller
{
    public function post(Request $request)
    {
        // ディレクトリ名を任意の名前で設定します
        $dir = 'img';

        // imgディレクトリを作成し画像を保存
        // storage/app/public/任意のディレクトリ名/
        $request->file('image')->post('public/' . $dir);
        return view('bulletin');
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