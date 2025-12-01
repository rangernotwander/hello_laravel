{{-- resources/views/sessions/create.blade.php --}}
@extends('layouts.app')
@section('title', '登录')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>登录</h5>
    </div>
    <div class="card-body">
      @include('shared._messages')

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">邮箱：</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">密码：</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        {{-- 👇 新增：记住我复选框 --}}
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">记住我</label>
        </div>

        <button type="submit" class="btn btn-primary">登录</button>
      </form>

      <hr>

      <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
    </div>
  </div>
</div>
@endsection
