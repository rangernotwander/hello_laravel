{{-- resources/views/partials/_header.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">MyBlog</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('help')}}">帮助</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">登录</a>
            </li>
        </ul>
    </div>
</nav>
