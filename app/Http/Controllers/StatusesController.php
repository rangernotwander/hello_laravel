<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // ✅ Laravel 12 推荐使用 validate() 方法（替代 $this->validate）
        $request->validate([
            'content' => 'required|string|max:140',
        ]);

        Auth::user()->statuses()->create([
            'content' => $request->input('content'),
        ]);

        return back()->with('success', '发布成功！');
    }

    public function destroy(Status $status)
    {
        // 🔒 权限检查：只能删除自己的微博
        if ($status->user_id !== Auth::id()) {
            abort(403, '无权删除此微博');
        }

        $status->delete();

        return back()->with('success', '微博已删除');
    }
}
