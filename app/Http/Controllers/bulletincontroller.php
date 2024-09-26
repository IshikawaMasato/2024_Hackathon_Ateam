<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\report;
use App\Models\tag;
use App\Models\report_tag;

class bulletincontroller extends Controller
{
    public function index()
    {
        $reports = report::get();
        return view('auth.index', compact('reports'));
    }

    public function auth()
    {
        // メソッドの処理をここに記述
        // カテゴリーの一覧取得
        $categorys = tag::where('delete_flag', 0)->get();

        return view('auth.bulletin', ['categorys' => $categorys]);
    }

    public function bulletin(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys = tag::where('delete_flag', 0)->get();

        return view('auth.bulletin', ['categorys' => $categorys]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $img = $request->file('img_path');
        
        // 画像がアップロードされた場合のパスを取得
        if ($img) {
            $path = $img->store('public');
            $imgPath = basename($path);
        } else {
            $imgPath = 'default.img'; // 画像がない場合のデフォルト値
        }

        // reportの作成
        $report = report::create([
            'title' => $request->input('title'),
            'report' => $request->input('textarea'), // フォームからのtextareaをreportとして保存
            'user_id' => $user->id, // ログイン中のユーザーのIDを設定
            'img_path' => $imgPath,
            'category' => $request->input('category'),
        ]);

        // 投稿とタグの関連付け
        $tag = $request->input('category');
        report_tag::create([
            'report_id' => $report->id,
            'tag_id' => $tag,
        ]);

        return redirect('/');
    }
}
