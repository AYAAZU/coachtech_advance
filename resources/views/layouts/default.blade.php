<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

  <!-- ★後で消す★CSSを外部から読み込む場合（assetはまずい？？）-->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

  <style>
    div.menu {
      display: inline-block;
      background-color: rgb(53, 96, 246);
      box-shadow: 3px 3px 2px grey;
      border-radius: 7px;
      padding: 5px;
      color: white;
      width: 36px;
      height: 32px;
      cursor: pointer;
      position: fixed;
      left: 80px;
      top: 20px;
      z-index: 200;
    }

    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 1px;
      background-color: white;
      border: none;
      position: absolute;
      transition: 0.5s;
      margin: 5px;
    }

    .menu__line--top {
      top: 6px;
      width: 25%;
    }

    .menu__line--middle {
      top: 17px;
      width: 55%;
    }

    .menu__line--bottom {
      bottom: 6px;
      width: 10%;
    }

    .menu.open span:nth-of-type(1) {
      top: 14px;
      transform: rotate(45deg);
      width: 100%;
      position: absolute;
      left: -5px;
    }

    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }

    .menu.open span:nth-of-type(3) {
      top: 14px;
      transform: rotate(-45deg);
      width: 100%;
      position: absolute;
      left: -5px;
    }

    .menu__rese {
      position: absolute;
      left: 60px;
      display: inline-block;
      color: rgb(53, 96, 246);
      font-size: 36px;
      font-weight: bolder;
    }


    /*ナビゲーション画面*/
    .nav {
      position: absolute;
      height: 100vh;
      width: 100%;
      top: 0;
      left: -100%;
      z-index: 100;
      background: white;
      transition: .7s;
      text-align: center;
    }

    .nav ul {
      padding-top: 80px;
      font-size: 30px;
    }

    .nav ul li {
      list-style-type: none;
      margin-top: 50px;
    }

    .in {
      transform: translateX(100%);
    }


  </style>
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
      <li><a href="/logout">Logout</a></li>
      <li><a href="/mypage">Mypage</a></li>
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