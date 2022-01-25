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

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
  <style>
    div.shop_card {
      width: 80%;
    }

    .shop_image img {
      width: 100%;
    }

    div.rese_card {
      width: 100%;
      background: blue;
      padding: 20px;
      color: white;
    }

    .rese_card input,
    select {
      display: block;
    }

    dl.rese_confirmation {
      padding: 20px;
      background: green;
    }

    dl {
      display: flex;
      flex-wrap: wrap;
      padding: 50px;
    }

    dt {
      width: 30%;
      padding: 10px;
    }

    dd {
      padding: 10px;
      margin: 0;
      width: 70%;
    }

    dl.rese_confirmation input {
      background: transparent;
      border: none;
    }

    .rese_card p {
      padding: 5px;

    }

    .rese_card p a {
      color: white;
      text-decoration: underline;
      font-weight: bold;
    }

    button {
      cursor: pointer;
    }
  </style>
</head>

<body>
  @section('content')
  @auth
  <div class="right_part">
    <!--予約機能-->
    <div class="f_card">
      <h2>お気に入り</h2>
      <!--ログイン状態での閲覧-->
      <p>{{$user->name}}さん</p>
    </div>
  </div>
  <script type="text/javascript">
    /*？？*/
  </script>

  <div class="left_part_small">
    <!--予約情報の表示-->
    @foreach($my_reservations as $my_reservation)
    <div class="rese_card">
      <form action="/reservation/del" method="post" name="rese_form">
        @csrf
        <p>時計アイコン追加は後で</p>
        <h2>予約{{$loop->iteration}}</h2>
        <button type="submit"> × アイコンは後で</button>
        <dl class="rese_del">
          <dt>Shop</dt>
          <dd>{{$my_reservation->shop->getShopName()}}</dd>
          <dt>Date</dt>
          <dd>{{$my_reservation->getDate()}}</dd>
          <dt>Time</dt>
          <dd>{{$my_reservation->getTime()}}</dd>
          <dt>Number</dt>
          <dd>{{$my_reservation->number}}人</dd>
        </dl>
        <input type="hidden" name="rese_id" value="{{$my_reservation->id}}">
      </form>
    </div>
    <br>
    @endforeach
  </div>
</body>
@else
<!--ログアウト状態での閲覧はない-->
@endauth

</html>