{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.app')
@section('title', '找回密码')

@section('content')
<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header"><h5>找回密码</h5></div>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">邮箱地址：</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">发送重置链接</button>
      </form>
    </div>
  </div>
</div>
@endsection
