<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController; // ← 这一行必须加上！
use App\Http\Controllers\UsersController; // ← 这一行必须加上！

//静态也main
Route::get('/',[StaticPagesController::class,'home'])->name('home');
Route::get('/help',[StaticPagesController::class,'help'])->name('help');
Route::get('/about',[StaticPagesController::class,'about'])->name('about');


//用户注册
Route::get('/signup',[UsersController::class,'create'])->name('signup');
