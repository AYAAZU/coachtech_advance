<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <style>
    /*! reset.css */
    html,
    body,
    div,
    span,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    abbr,
    address,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    samp,
    small,
    strong,
    sub,
    sup,
    var,
    b,
    i,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section,
    summary,
    time,
    mark,
    audio,
    video {
      margin: 0;
      padding: 0;
      border: 0;
      outline: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
    }

    body {
      line-height: 1;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
      display: block;
    }

    nav ul {
      list-style: none;
    }

    ul {
      list-style: none;
    }

    blockquote,
    q {
      quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
      content: '';
      content: none;
    }

    a {
      margin: 0;
      padding: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
    }

    /* change colours to suit your needs */
    ins {
      background-color: #ff9;
      color: #000;
      text-decoration: none;
    }

    /* change colours to suit your needs */
    mark {
      background-color: #ff9;
      color: #000;
      font-style: italic;
      font-weight: bold;
    }

    del {
      text-decoration: line-through;
    }

    abbr[title],
    dfn[title] {
      border-bottom: 1px dotted;
      cursor: help;
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
    }

    /* change border colour to suit your needs */
    hr {
      display: block;
      height: 1px;
      border: 0;
      border-top: 1px solid #cccccc;
      margin: 1em 0;
      padding: 0;
    }

    input,
    select {
      vertical-align: middle;
    }
  </style>
  <style>
    body {
      font-size: 16px;
    }

    div.background {
      width: 100%;
      height: 100vh;
      background-color: rgb(238, 238, 238);
      display: flex;
    }

    div.menu {
      display: inline-block;
      background-color: rgb(53, 96, 246);
      padding: 5px;
      color: white;
      width: 36px;
      height: 32px;
      cursor: pointer;
      position: relative;
      left: 20px;
      top: 20px;
    }

    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 3px;
      background-color: white;
      position: absolute;
      transition: 0.5s;
    }

    .menu__line--top {
      top: 5px;
      width: 40%;
    }

    .menu__line--middle {
      top: 18px;
      width: 80%;
    }

    .menu__line--bottom {
      bottom: 5px;
      width: 20%;
    }

    .menu.open span:nth-of-type(1) {
      top: 14px;
      transform: rotate(45deg);
      width: 100%;
      position: absolute;
    }

    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }

    .menu.open span:nth-of-type(3) {
      top: 14px;
      transform: rotate(-45deg);
      width: 100%;
      position: absolute;
    }

    a {
      text-decoration: none;
      color: blue
    }

    .nav {
      position: absolute;
      height: 100vh;
      width: 100%;
      left: -100%;
      background: white;
      transition: .7s;
      text-align: center;
    }

    .nav ul {
      padding-top: 80px;
    }

    .nav ul li {
      list-style-type: none;
      margin-top: 50px;
    }

    .in {
      transform: translateX(100%);
    }

    .menu__rese {
      position: absolute;
      left: 60px;
      display: inline-block;
      color: rgb(53, 96, 246);
      font-size: 36px;
    }

    div.window_box {
      width: 35%;
      background-color: white;
      margin: auto;
      letter-spacing: 1px;
    }

    .window_box h2 {
      padding: 5px 0px;
      width: 100%;
      background-color: rgb(53, 96, 246);
      color: white;
    }

    .window_box li {
      margin: 5px;
    }

    .window_box table input[type="submit"] {
      background-color: rgb(53, 96, 246);
      color: white;
    }

    .user_fill__name::before {
      content: "\f007";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
    }

    .user_fill__email::before {
      content: "\f0e0";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
    }

    .user_fill__password::before {
      content: "\f023";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
    }

    .right_part {
      width: 40%;
      position: absolute;
      top: 10px;
      right: 100px;
    }

    .left {
      width: 80%;
      position: absolute;
      top: 70px;
      left: 60px;
    }

    .left_part {
      width: 40%;
      position: absolute;
      top: 70px;
      left: 60px;
    }

    .left_part_small {
      width: 25%;
      position: absolute;
      top: 70px;
      left: 60px;
    }
  </style>

</head>

<body>
  <h1>@yield('title')</h1>
  <div class="background">
    @yield('content')
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
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
      <span class="menu__rese">Rese</span>
    </div>
    @yield('content_auth')
  </div>

</body>
<script type="text/javascript">
  const target = document.getElementById("menu");
  target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("nav");
    nav.classList.toggle('in');
  });
</script>

</html>