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
        if (Auth::attempt($credentials,$request->boolean('remember'))) {
            // 防止会话固定攻击（可选但推荐）
            $request->session()->regenerate();

            // ✅ 关键修改：使用 intended() 实现智能重定向
            //session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user()); // 默认跳转到个人中心
            //return redirect()->route('users.show', Auth::user());
            return redirect()->intended($fallback)
                         ->with('success', '欢迎回来！');
        }

        // 登录失败
        // session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
        // return back()->withInput();
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
