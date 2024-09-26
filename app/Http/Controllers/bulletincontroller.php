<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\report;
use App\Models\tags;
use App\Models\report_tag;

class bulletincontroller extends Controller
{
    public function index()
    {
        $reports = report::get();
        return view('auth.index', compact('reports'));
    }

    public function bulletin(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys = tags::where('delete_flag', 0)->get();

        return view('auth.bulletin', ['categorys' => $categorys]);
    }

    // public function store(Request $request)
    // {
    //     $img = $request->file('img_path');
    //     $report = $request->all();
    //     $path = $img->store('public');

    //     reports::create(array_merge($report, ['img_path' => basename($path)]));
    //     return redirect()->route('auth.index');
    // }
    public function store(Request $request)
    {
        $user = Auth::user();

        $img = $request->file('img_path');
        // 画像がアップロードされた場合のパスを取得
        if ($img) {
            $path = $img->store('public');
            $imgPath = basename($path);
        } else {
            $imgPath = null; // 画像がない場合の処理
            $report = report::create([
                'title' => $request->input('title'),
                'report' => $request->input('textarea'), // フォームからのtextareaをreportとして保存
                'user_id' => $user->id, // ログイン中のユーザーのIDを設定
                'img_path' => $imgPath,
                'category' => $request->input('category'),
            ]);

            $tag = $request->input('category');
            report_tag::create([
                'report_id' => $report->id,
                'tag_id' => $tag,
            ]);

            return redirect('/');
        }
    }
}
