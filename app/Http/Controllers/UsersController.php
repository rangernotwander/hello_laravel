<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //← 必须引入 User 模型
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    // 显示用户注册页面
    public function create()
    {
        return view('users.create');
    }
    // 显示用户个人资料页（隐性模型绑定）
    public function show(User $user)
    {
                // 如果你想禁止查看他人资料：
        if (Auth::id() !== $user->id) {
            abort(403, '禁止访问他人资料');
        }
        return view('users.show',compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // 创建用户（密码会自动哈希，因为 User 模型有 casts: 'password' => 'hashed'）
        $user = User::create($data);

        // 闪存成功消息
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        // 重定向到用户个人页（例如 /users/1）
        return redirect()->route('users.show', $user);
    }


}
