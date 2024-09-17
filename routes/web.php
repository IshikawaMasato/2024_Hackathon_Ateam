<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypagecontroller;
use App\Http\Controllers\bulletincontroller;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bulletin',[bulletincontroller::class,'bulletin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mypage', [mypagecontroller::class, 'mypage']);
    Route::get('/editpost',[editpostcontroller::class,'editpost']);
    Route::get('/viewpost',[viewpostcontroller::class,'viewpost']);
    Route::get('/follow',[followcontroller::class,'follow']);
    Route::get('/accountdelete',[accountdeletecontroller::class,'accountdelete']);
    Route::get('/registration',[registrationcontroller::class,'registration']);
});

require __DIR__.'/auth.php';

