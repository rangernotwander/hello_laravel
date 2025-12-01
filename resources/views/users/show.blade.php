@extends('layouts.app')
@section('title', $user->name . ' 的个人主页')

@section('content')
<div class="offset-md-2 col-md-8">
    <div class="card">
        <div class="card-header">
            <h5>{{ $user->name }} 的个人主页</h5>
        </div>
        <div class="card-body text-center">
            <img src="{{ $user->gravatar(100) }}"
                 alt="{{ $user->name }}"
                 class="rounded-circle mb-3"
                 width="100"
                 height="100">
            <p><strong>用户名：</strong>{{ $user->name }}</p>
            <p><strong>邮箱：</strong>{{ $user->email }}</p>
            <p><strong>加入时间：</strong>{{ $user->created_at->format('Y-m-d') }}</p>
        </div>
    </div>
</div>
@endsection
