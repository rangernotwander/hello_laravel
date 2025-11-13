<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController; // ← 这一行必须加上！
// Route::get('/', function () {
//     return view('static_pages.home'); // ← 必须返回继承了布局的视图
// })->name('home');

// Route::get('/help', function () {
//     return '<div class="container mt-4"><h2>帮助中心</h2><p>这里是帮助内容...</p></div>';
// });

Route::get('/',[StaticPagesController::class,'home'])->name('home');
Route::get('/help',[StaticPagesController::class,'help'])->name('help');
Route::get('/about',[StaticPagesController::class,'about'])->name('about');

