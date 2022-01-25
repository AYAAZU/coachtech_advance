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
    <!-- Session Status -->

    <!-- Validation Errors-->


    @section('content_auth')
    <div class="window_box">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <ul>
                <li>
                    <!-- Email Address -->
                    <div class="user_fill__email">
                        <input id="email" class="" type="email" name="email" placeholder="Email" required />
                    </div>
                </li>
                <li>
                    <!-- Password -->
                    <div class="user_fill__password">
                        <input id="password" class="" type="password" name="password" placeholder="Password" required>
                    </div>
                </li>
                <div class="">
                    <button class="">
                        {{ __('Log in') }}
                    </button>
                </div>
            </ul>
        </form>
    </div>
    @endsection
</body>

<!--
パスワードのインプットタグに下記は必要？
autocomplete="new-password"
-->

<!-- Remember Me 
                <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                </div>-->