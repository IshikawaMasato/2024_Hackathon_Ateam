<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\reports;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 投稿を削除する処理
    public function destroy($id)
    {
        // 投稿を削除
        $posts = reports::find($id);
        $posts->update(['delete_flag' =>1]);

        // 削除後、リダイレクトしてメッセージを表示
        return redirect()->route('profile.edit');
    }
}
