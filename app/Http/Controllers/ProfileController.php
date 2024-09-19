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

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        // Postモデルからすべての投稿を取得
        $posts = reports::all();

        // user と posts を view に渡す
        return view('profile.edit', [
            'user' => $request->user(),
            'posts' => $posts,
        ]);
    }


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
}
