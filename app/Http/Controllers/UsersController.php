<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //← 必须引入 User 模型
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    //构造方法中添加中间件验证
        public function __construct()
    {
        // 只有未登录用户能访问 create（注册页）
        $this->middleware('guest')->only(['create']);

        // 除 show, create, store 外，其他操作需登录
        // $this->middleware('auth')->except(['show', 'create', 'store']);
        $this->middleware('auth')->except(['create', 'store']);
    }
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
    // 用户资料编辑页面
    public function edit(User $user)
    {

        //权限控制，自己只能编辑自己的治疗
        // if(Auth::id() !== $user->id){
        //     abort(403,'对不起，您没有权限操作。');
        // }
        $this->authorize('update', $user); // 使用 Policy 校验

        return view('users.edit',compact('user'));
    }

    // 提交执行用户资料更新操作
    public function update(Request $request, User $user)
    {
        //再次验证更新权限
        // if(Auth::id() !== $user->id){
        //     abort(403,'对不起，您没有权限操作。');
        // }
        $this->authorize('update', $user);
        //验证输入
        $request->validate([
            'name' => ['required','string','max:50'],
            'password' => ['nullable','string','confirmed','min:6']
        ]);

        //构建要更新的数据
        $data = ['name' => $request->name];

        //仅当提供了新密码的时候才更新
        if($request -> filled('password')){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.show', $user)
                         ->with("success",'个人资料更新成功！');

    }
    //添加分页方法
    public function index()
    {
        // 分页：每页 10 个用户（避免性能问题）
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

}
