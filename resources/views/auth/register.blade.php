<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rese</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @extends('layouts.default')
</head>

<body>

    @section('content_auth')
    <div class="window_box">
        <h2>Registration</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <ul>
                <li>
                    <!-- Name -->
                    <div class="user_fill__name">
                        <input id="name" class="user_fill__name" type="text" name="name" placeholder="Username" required autofocus>
                    </div>
                </li>
                <li>
                    <!-- Email Address -->
                    <div class="user_fill__email">
                        <input id="email" class="" type="email" name="email" placeholder="Email" required>
                    </div>
                </li>
                <li>
                    <!-- Password -->
                    <div class="user_fill__password">
                        <input id="password" class="" type="password" name="password" placeholder="Password" required>
                    </div>
                </li>
                <div class="">
                    <button class="">登録</button>
                </div>
            </ul>
        </form>
    </div>
    @endsection
</body>
<!--@guest
    // ユーザーは認証されていない
    @endguest-->
<!-- Validation Errors-->
 @if ($errors->any())
    <div>
        <div>
            {{ __('エラーメッセージ') }}
        </div>

        <ul class="">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif