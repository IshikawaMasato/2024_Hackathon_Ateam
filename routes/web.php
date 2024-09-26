<?php

// コントローラーの部分
// どこにアクセスするか書かれている

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypagecontroller;
use App\Http\Controllers\bulletincontroller;
use App\Http\Controllers\editbulletincontroller;
use App\Http\Controllers\viewpostcontroller;
use App\Http\Controllers\viewlistcontroller;
use App\Http\Controllers\PostController;

//最初の画面をviewlistに変更
Route::get('/', [viewlistcontroller::class, 'viewlist']);

Route::get('/viewpost', [viewpostcontroller::class, 'viewpost']);

Route::get('/search', [viewpostController::class, 'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bulletin/auth', [BulletinController::class, 'auth'])->name('bulletin.auth');
Route::get('/bulletin', [bulletincontroller::class, 'bulletin'])->name('reports.bulletin');
Route::post('/store', [editbulletincontroller::class, 'store'])->name('reports.store');
Route::post('/store', [bulletincontroller::class, 'store'])->name('reports.store');

Route::get('/auth/editbulletin/{id}', [ProfileController::class, 'editbulletin'])->name('auth.editbulletin');

// アクセスされているか確認して実行する
Route::middleware('auth')->group(function () {

    // 投稿削除用のルート
    Route::get('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // フォロー・フォロワー数表示
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.edit');

    // フォロー中のユーザーを表示するページ
    Route::get('/profile/follow', [ProfileController::class, 'followPage'])
        ->name('profile.follow');

    // フォロワーの一覧を表示するページも同様に設定
    Route::get('/profile/follower', [ProfileController::class, 'followerPage'])
        ->name('profile.follower');

    // 他ユーザーの表示
    Route::get('/profile/{userId}', [ProfileController::class, 'show'])->name('profile.otherUser');

    Route::post('/viewpost', [viewpostController::class, 'viewpost']);

    Route::get('/delete/{id}', [viewpostController::class, 'delete'])->name('delete');
    Route::get('/follow/{id}', [viewpostController::class, 'follow'])->name('follow');
    Route::get('/delete_follow/{id}', [viewpostController::class, 'delete_follow'])->name('delete_follow');
    Route::get('/reactions/{id}', [viewpostController::class, 'reactions'])->name('reactions');
    Route::get('/delete_reactions/{id}', [viewpostController::class, 'delete_reactions'])->name('delete_reactions');
    Route::get('/comments/{id}', [viewpostController::class, 'comments'])->name('comments');

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
