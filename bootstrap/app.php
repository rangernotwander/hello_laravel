<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // 设置认证后首页（替代 RouteServiceProvider::HOME）/ 👇 这两行现在可能不生效，但未来有用
        $middleware->redirectGuestsTo(fn () => route('login'));
        $middleware->redirectUsersTo(fn () => '/'); // ← 已登录用户访问 /login 时跳这里
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
