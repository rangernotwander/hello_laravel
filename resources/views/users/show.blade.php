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

    {{-- 微博动态区域 --}}
    <section class="status mt-4">
        @if ($statuses->count() > 0)
            <ul class="list-unstyled">
                @foreach ($statuses as $status)
                    @include('statuses._status', ['status' => $status, 'user' => $status->user])
                @endforeach
            </ul>

            <div class="mt-4">
                {{ $statuses->links() }}
            </div>
        @else
            <div class="card mt-4">
                <div class="card-body text-muted">
                    <p>该用户还没有发布任何微博。</p>
                </div>
            </div>
        @endif
    </section>
</div>
@endsection
