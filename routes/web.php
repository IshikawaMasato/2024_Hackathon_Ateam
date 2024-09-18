<?php

// コントローラーの部分
// どこにアクセスするか書かれている

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//最初のアクセス
Route::get('/', function () {
    return view('./welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// アクセスされているか確認して実行する
Route::middleware('auth')->group(function () {
    // プロフィールのページにアクセスしたとき、ProfileControllerを呼び出す
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/update-image', [ProfileController::class, 'updateImage'])->name('profile.update_image');
});

require __DIR__.'/auth.php';
