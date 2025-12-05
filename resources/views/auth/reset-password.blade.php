{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.app')
@section('title', '重置密码')

@section('content')
<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header"><h5>重置密码</h5></div>
    <div class="card-body">
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3">
          <label for="email" class="form-label">邮箱</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', request('email')) }}" required>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">新密码</label>
          <input type="password" name="password" class="form-control" required>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">确认密码</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">重置密码</button>
      </form>
    </div>
  </div>
</div>
@endsection
