<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\report;
use App\Models\tag;
use App\Models\follows;
use App\Models\reactions;
use App\Models\comments;
use App\Models\report_tag;

class viewpostcontroller extends Controller
{
    public function viewpost()
    {
        // カテゴリーの一覧取得
        $categorys = tag::where('delete_flag',0)->get();
        $items = report::with('tag')->where('delete_flag',0)->get();

        return view('viewpost',['items'=>$items,'categorys'=>$categorys]);
    }

    public function search(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys= tag::where('delete_flag',0)->get();

        //カテゴリーとタグの中間テーブルから検索
        $report_tags = report_tag::where('delete_flag',0)->get();
        
        //$queryに検索文を作成
        $query=report::where('delete_flag',0);//公開中のデータのみ
        
            // キーワードがあったら検索文に含める
        if($request->keyword){
            //keywordが入力されていたら検索
            $query->where('title','LIKE',"%{$request->keyword}%");
        }
        
        // カテゴリが選択されていたら検索文に含める
        if($request->tag!=0){
            //カテゴリが選択されていたら検索
            $query = report_tag::where('tag_id',$request->tag);
            
        }

        // 作成日が入力されていたら検索文に含める
        if($request->created_at){
            $query->where('created_at',$request->created_at);
        }

        // 検索文をもとにデータの取得
        $items=$query->get();
        
        //一覧画面へ
        return view('viewpost',['items'=>$items,'categorys'=>$categorys]);
    }

    public function delete($id)
    {
        $reports = report::find($id);
        $reports->update(['delete_flag' => 1]);
        return redirect('viewpost');
    }
    
    public function follow($id)
    {
        $user_id = Auth::id();
        //フォローするユーザーが存在するか確認
        $userTofollow = User::find($id);
        if(!userTofollow){
            return redirect()->with('error','ユーザーが見つかりません。');
        }
        //すでにフォロー関係が存在するか確認
        $existingfollow = follows::where('follower_id',$user_id)->first();

        //$user_idと$idでデータが存在するか確認
       
        //あればリダイレクト
        //なければ↓の処理
        $follows = follows::create([
            'follower_id'=>$id,
            'followed_id'=>$user_id
        ]);

        return redirect('viewpost');
    }
    
    public function delete_follow($id)
    {
        $user_id = Auth::id();
        $follows = follows::where([
        'follower_id'=>$id,
        'followed_id'=>$user_id
        ]);
        $follows->update(['delete_flag' => 1]);
        return redirect('viewpost');
    }

    public function reactions($id)
    {
        $user_id = Auth::id();
        $reactions = reactions::create([
            'user_id'=>$id,
            'report_id'=>$user_id,
            'reaction_flag'=> 0
        ]);
        return redirect('viewpost');
    }
    
    public function delete_reactions($id)
    {
        $user_id = Auth::id();
        $reactions = reactions::where([
        'user_id'=>$id,
        'report_id'=>$user_id
        ]);
        $reactions->update(['reaction_flag' => 1]);
        return redirect('viewpost');
    }

    public function comments()
    {
        // カテゴリーの一覧取得
        $categorys = tag::where('delete_flag',0)->get();
        $items = report::where('delete_flag',0)->get();

        return view('viewpost',['items'=>$items,'categorys'=>$categorys]);
    }
}


