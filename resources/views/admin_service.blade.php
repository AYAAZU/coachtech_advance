<head>
  <title>Rese_admin</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/admin_service.css') }}">
  @extends('layouts.default')
</head>

<body>
  @section('content_auth')
  <div class="window_box_container">
    <div class="window_box">
      <h2>店舗代表者の登録・削除
      </h2><br>
      <p>■店舗代表者の登録</p>
      <form method="POST" action="/admin/register">
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
          <li>
            <!-- role -->
            <div class="user_fill__role">
              <input id="role" class="" type="hidden" name="role" value="3">
            </div>
          </li>
          <div class="">
            <button class="bluetype">登録</button>
          </div>
          <!-- Validation Errors-->
          @if ($errors->any())
          <div>
            <ul class="">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </ul>
      </form>
    </div>
  </div>
  @endsection

