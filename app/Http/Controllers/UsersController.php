<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //← 必须引入 User 模型

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
        return view('users.show',compact('user'));
    }

    public function store(Request $request)
    {
        // ✅ 现代写法：直接调用 $request->validate()
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // 暂时不创建用户，先测试验证是否生效
        dd($data); // 临时：打印验证通过的数据
    }


}
