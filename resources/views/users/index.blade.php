@extends('layouts.app')
@section('title', '所有用户')

@section('content')
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center">所有用户</h2>

  <div class="list-group list-group-flush">
    @foreach ($users as $user)
      @include('users._user', ['user' => $user])
    @endforeach
  </div>

  <div class="mt-4 d-flex justify-content-center">
    {{ $users->links() }} {{-- ✅ 安全、自动转义、支持 Bootstrap 5 --}}
  </div>
</div>
@endsection
