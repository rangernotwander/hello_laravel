@extends('layouts.app')
@section('title', '更新个人资料')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>更新个人资料</h5>
    </div>
    <div class="card-body">
      @include('shared._messages') {{-- 显示 success/danger --}}

      <div class="text-center mb-4">
        <img src="{{ $user->gravatar(100) }}" alt="{{ $user->name }}" class="rounded-circle">
        <p class="mt-2">
          <a href="https://gravatar.com/emails" target="_blank" class="btn btn-sm btn-outline-secondary">
            更换头像（Gravatar）
          </a>
        </p>
      </div>

      <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PATCH') {{-- 替代 {{ method_field('PATCH') }} --}}

        <div class="mb-3">
          <label for="name" class="form-label">名称：</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">邮箱：</label>
          <input type="email" class="form-control" value="{{ $user->email }}" disabled>
          <div class="form-text">注册后邮箱不可更改</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">新密码（可选）：</label>
          <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">确认新密码：</label>
          <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">更新资料</button>
        <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">取消</a>
      </form>
    </div>
  </div>
</div>
@endsection
