@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row">
    <div class="offset-md-2 col-md-8">
        <section class="user_info text-center">
            @include('shared._user_info', ['user' => $user])
        </section>
    </div>
</div>
@endsection
