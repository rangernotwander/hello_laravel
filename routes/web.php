<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController; // 引入 StaticPagesController
use App\Http\Controllers\UsersController;       // 引入 UsersController
use App\Http\Controllers\SessionsController;     // 添加这一行来引入 SessionsController

//静态页面路由
Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('/help', [StaticPagesController::class, 'help'])->name('help');
Route::get('/about', [StaticPagesController::class, 'about'])->name('about');

//用户注册
Route::get('/signup', [UsersController::class, 'create'])->name('signup');

// 用户资源路由
Route::resource('users', UsersController::class);

// 登录 & 退出
Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store'])->name('login');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout'); // 注意：改为 POST
