<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reports;
use App\Models\tags;

class viewpostcontroller extends Controller
{
    public function viewpost()
    {
        // カテゴリーの一覧取得
        $categorys= tags::where('delete_flag',0)->get();

        $items = reports::where('delete_flag',0)->get();
        return view('viewpost',['items'=>$items,'categorys'=>$categorys]);
    }

    public function search(Request $request)
    {
        // カテゴリーの一覧取得
        $categorys= tags::where('delete_flag',0)->get();
        
        //$queryに検索文を作成
        $query=reports::where('delete_flag',0);//公開中のデータのみ
        
            // キーワードがあったら検索文に含める
        if($request->keyword){
            //keywordが入力されていたら検索
            $query->where('name','LIKE',"%{$request->keyword}%");
        }
        
        // カテゴリが選択されていたら検索文に含める
        if($request->category!=0){
            //カテゴリが選択されていたら検索
            $query->where('category_id',$request->category);
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
        $reports = reports::find($id);
        $reports->update(['delete_flag' => 1]);
        return redirect('viewpost');
    }
}

//　投稿閲覧


