<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyBlog')</title>

    {{-- 关键：加载 Vite 编译后的 CSS 和 JS --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

{{-- 顶部导航栏 --}}
    {{-- 引入头部局部视图 --}}
    @include('partials._header')

{{-- 页面主体内容 --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- 👇 新增：引入页脚 --}}
    @include('partials._footer')

</body>
</html>
