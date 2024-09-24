<?php

// コントローラーの部分
// どこにアクセスするか書かれている

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypagecontroller;
use App\Http\Controllers\bulletincontroller;
use App\Http\Controllers\viewpostcontroller;
use App\Http\Controllers\PostController;

//最初のアクセス
Route::get('/', function () {
    return view('./welcome');
});

Route::get('/viewpost', [viewpostcontroller::class, 'viewpost']);
Route::get('/search', [viewpostController::class, 'search']);
Route::get('/delete/{id}', [viewpostController::class, 'delete'])->name('delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/', [bulletincontroller::class, 'index'])->name('reports.index');
Route::get('/bulletin', [bulletincontroller::class, 'bulletin'])->name('reports.bulletin');
Route::post('/store', [bulletincontroller::class, 'store'])->name('reports.store');

// 投稿削除用のルート
Route::get('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// フォロー・フォロワー数表示
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.edit');


// フォロー数表示のページ遷移
Route::get('/profile/follow/{userId}', [ProfileController::class, 'followPage'])->name('profile.follow');

// フォロワー数表示のページ遷移
Route::get('/profile/follower/{userId}', [ProfileController::class, 'followerPage'])->name('profile.follower');


// アクセスされているか確認して実行する
Route::middleware('auth')->group(function () {
    
    // Route::get('/report', function () {
    //     // 全ての投稿を取得
    //     $posts = App\Models\Post::all();
    //     // 'profile.partials.report' というパスでビューを指定
    //     return view('profile.partials.report', compact('posts'));
    // })->name('report');

    // プロフィールのページにアクセスしたとき、ProfileControllerを呼び出す
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/update-image', [ProfileController::class, 'updateImage'])->name('profile.update_image');

    Route::get('/mypage', [mypagecontroller::class, 'mypage']);
    Route::get('/editpost', [editpostcontroller::class, 'editpost']);
    Route::get('/viewpost', [viewpostcontroller::class, 'viewpost']);
    Route::get('/follow', [followcontroller::class, 'follow']);



});

require __DIR__ . '/auth.php';
