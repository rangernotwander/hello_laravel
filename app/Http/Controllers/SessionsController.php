<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * 显示登录页面
     */
    public function create()
    {
        // ✅ 如果用户已登录，直接重定向到首页（或个人中心）
        if (Auth::check()) {
            return redirect()->route('users.show', Auth::user())
                            ->with('info', '您已登录，无需重复操作。');
        }
        return view('sessions.create');
    }

    /**
     * 处理登录请求
     */
    public function store(Request $request)
    {
        // 验证输入
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        // 尝试登录
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // 防止会话固定攻击
            $request->session()->regenerate();

            // ✅ 关键：检查账户是否已激活
            if (Auth::user()->activated) {
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)
                                ->with('success', '欢迎回来！');
            } else {
                // 账户未激活 → 强制退出 + 提示
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/')->with('warning', '您的账号尚未激活，请查收注册邮件并点击确认链接。');
            }
        }

        // 登录失败（邮箱/密码错误）
        return back()->withErrors([
            'email' => '邮箱或密码不正确。',
        ])->onlyInput('email');
    }

    /**
     * 退出登录
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', '您已成功退出！'); // 👈 添加闪存消息
    }
}
