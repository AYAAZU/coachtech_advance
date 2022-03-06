<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Style-->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <h1>@yield('title')</h1>
  <div class="background">
    <div id="content">
      @yield('content')
    </div>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
      <span class="menu__rese">Rese</span>
    </div>
    @yield('content_auth')
  </div>
  <nav class="nav" id="nav">
    @auth
    <ul>
      <li><a href="/">Home</a></li>
      @cannot('isAdmin_service')
      @cannot('isAdmin_shop')
      <li><a href="/mypage">Mypage</a></li>
      @endcannot
      @endcannot
      @can('isAdmin_service')
      <li><a href="/admin">Add Shop Representative</a></li>
      @endcan
      @can('isAdmin_shop')
      <li><a href="/adminshop">Shop page</a></li>
      <li><a href="/adminshop/reservations">Reservation Lists</a></li>
      @endcan
      <li><a href="/logout">Logout</a></li>
    </ul>
    @else
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registration</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
    @endauth
  </nav>
  <script src="{{ asset('js/index.js') }}"></script>
</body>



</html>