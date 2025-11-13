<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('static_pages.home'); // ← 必须返回继承了布局的视图
})->name('home');

Route::get('/help', function () {
    return '<div class="container mt-4"><h2>帮助中心</h2><p>这里是帮助内容...</p></div>';
});

