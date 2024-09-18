<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypagecontroller;
use App\Http\Controllers\bulletincontroller;
use App\Http\Controllers\viewpostcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viewpost', [viewpostcontroller::class, 'viewpost']);
Route::get('/search', [viewpostController::class, 'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [bulletincontroller::class, 'index'])->name('reports.index');
Route::get('/bulletin', [bulletincontroller::class, 'bulletin'])->name('reports.bulletin');
Route::post('/store', [bulletincontroller::class, 'store'])->name('reports.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mypage', [mypagecontroller::class, 'mypage']);
    Route::get('/editpost', [editpostcontroller::class, 'editpost']);
    Route::get('/viewpost', [viewpostcontroller::class, 'viewpost']);
    Route::get('/follow', [followcontroller::class, 'follow']);
});

require __DIR__ . '/auth.php';
