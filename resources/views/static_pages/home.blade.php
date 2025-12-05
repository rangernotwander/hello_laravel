@extends('layouts.app')
@section('title', '首页')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Auth::check())
                {{-- 发布微博卡片 --}}
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">发布微博</h5>
                    </div>
                    <div class="card-body">
                        @include('shared._status_form')
                    </div>
                </div>

                {{-- 微博动态流（下一节实现，先占位） --}}
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">最新动态</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">动态流将在下一节实现...</p>
                    </div>
                </div>
            @else
                {{-- 未登录用户：原始欢迎卡片 --}}
                <div class="bg-light p-3 p-sm-5 rounded shadow-sm text-center">
                    <h1>Hello Laravel 12!</h1>
                    <p class="lead">
                        你现在所看到的是 <strong>MyBlog</strong> 项目的主页。
                    </p>
                    <p>一切，将从这里开始。</p>
                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在注册</a>
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
