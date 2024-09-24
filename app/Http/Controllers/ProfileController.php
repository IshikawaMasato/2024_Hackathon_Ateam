<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\reports;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post; // Postモデルをインポート
use App\Models\Follower;

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        // 現在ログインしているユーザーIDを取得
        $userId = Auth::id();
    
        // フォロワーデータを取得
        $followers = Follower::where('followed_id', $userId)->get();
    
        // フォロー中のデータを取得 (follower_idが現在のユーザーをフォローしているユーザーIDを取得)
        $follows = Follower::where('follower_id', $userId)->get();
    
        // Postモデルからすべての投稿を取得
        $posts = reports::where('delete_flag', 0)->get();
    
        // user, posts, followers, followsをviewに渡す
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $posts,
            'followers' => $followers,
            'follows' => $follows, // フォローしているデータをビューに渡す
        ]);
    }
    

    // public function edit(Request $request): View
    // {

    //     // 現在ログインしているユーザーIDを取得
    //     $userId = Auth::id();

    //     // フォロワーデータを取得
    //     $followers = Follower::where('followed_id', $userId)->get();

    //     // Postモデルからすべての投稿を取得
    //     $posts = reports::where('delete_flag', 0)->get();

    //     // user と posts を view に渡す
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //         'posts' => $posts,
    //         'followers' => $followers, // フォロワーデータをビューに渡す

    //     ]);
    // }


    public function update(Request $request)
    {
        $user = Auth::user();

        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
        ]);

        // 画像がアップロードされた場合
        if ($request->hasFile('img_path')) {
            // 画像の保存
            $path = $request->file('img_path')->store('profiles', 'public');
            $user->img_path = $path;
        }

        // 他のアカウント情報の更新
        $user->name = $request->name;
        $user->email = $request->email;

        // 保存
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // プロフィール画像のアップデート
    public function updateImage(Request $request)
    {
        $request->validate([
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();

        // 新しい画像を保存
        $path = $request->file('img_path')->store('profile_images', 'public');
        $user->img_path = $path;
        $user->save();

        return redirect()->back()->with('status', 'image-updated');
    }


    // フォロー数を表す
    public function followPage($userId)
    {
        // フォロー中のユーザーのIDを取得
        $followingIds = Follower::where('follower_id', $userId)->pluck('followed_id');

        // フォロー中のユーザー情報を取得
        $follows = reports::whereIn('id', $followingIds)->get(); // Userモデルで取得

        // フォローしているユーザー情報をビューに渡す
        return view('profile.follow', compact('follows'));
    }
    public function followerPage($userId)
    {
        // フォロワーのIDを取得（0件の場合も考慮）
        $followerIds = Follower::where('followed_id', $userId)->pluck('follower_id');

        // フォロワーのユーザー情報を取得
        $followers = reports::whereIn('id', $followerIds)->get();

        // フォロワー情報をビューに渡す（0件でも表示可能）
        return view('profile.follower', compact('followers'));
    }

}
