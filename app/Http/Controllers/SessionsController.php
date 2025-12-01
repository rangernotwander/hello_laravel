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

            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', Auth::user());
        }

        // 登录失败
        session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
        return back()->withInput();
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
