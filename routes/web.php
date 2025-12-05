<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController; // 注意：你写的是 StaticPagesController
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;

// 静态页面
Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('/help', [StaticPagesController::class, 'help'])->name('help');
Route::get('/about', [StaticPagesController::class, 'about'])->name('about');

// 注册（独立于 users 资源）
Route::get('/signup', [UsersController::class, 'create'])->name('signup');
Route::post('/signup', [UsersController::class, 'store'])->name('signup.store'); // ← 添加 name

Route::get('/signup/confirm/{token}', [UsersController::class, 'confirmEmail'])
    ->name('confirm_email');

// 用户资料管理（排除注册相关）
Route::resource('users', UsersController::class)->except(['create', 'store']);

// 登录 & 退出
Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');




use App\Http\Controllers\PasswordController;

// 忘记密码流程
Route::get('/password/reset', [PasswordController::class, 'request'])->name('password.request');
Route::post('/password/email', [PasswordController::class, 'email'])->name('password.email');
Route::get('/password/reset/{token}', [PasswordController::class, 'resetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordController::class, 'update'])->name('password.update');

// 在文件末尾添加
use App\Http\Controllers\StatusesController;

Route::resource('statuses', StatusesController::class)->only(['store', 'destroy']);
