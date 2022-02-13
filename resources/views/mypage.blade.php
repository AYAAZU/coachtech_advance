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
    /*レイアウト　幅*/
    .right_part {
      width: 60%;
    }

    .left_part {
      width: 40%;
    }

    /*お気に入り表示*/
    .favorite_part h2 {
      margin: 10px;
    }

    .favorite_part_content {
      display: flex;
      flex-wrap: wrap;
    }

    /*予約表示*/
    div.reselist {
      width: 80%;
      min-width: 240px;
      background: blue;
      box-shadow: 3px 3px 2px grey;
      border-radius: 7px;
      padding: 20px;
      margin: 5px 0px;
      color: white;
    }

    .reselist_head {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }

    /*.reselist input,
    select {
      display: block;
    }*/

    dl.reselist_dl {
      display: flex;
      flex-wrap: wrap;
      padding: 5px 0 5px 5px;
    }

    .reselist_dl dt {
      width: 40%;
      height: 28px;
      margin-bottom: 3px;
    }

    .reselist_dl dd {
      width: 60%;
      height: 28px;
    }

    .reselist_dl dd input,
    .reselist_dl dd select {
      height: 28px;
      border-radius: 5px;
    }

    .reselist h4::before {
      content: "\f017";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      color: white;
      cursor: pointer;
    }

    div.rese_del_button button {
      background-color: transparent;
      border: none;
    }

    div.rese_del_button ::after {
      content: "\f057";
      font-family: "Font Awesome 5 Free";
      font-size: 1.5em;
      font-weight: 400;
      color: white;
      cursor: pointer;
    }

    .reselist p {
      padding: 5px;
    }

    .reselist p a {
      color: white;
      text-decoration: underline;
      font-weight: bold;
    }

    .reselist button.change {
      width: 100px;
      background-color: white;
      border-radius: 10px;
      border: none;
      margin: 3px 0;
    }

    .reselist button span {
      display: none;
    }

    div.change_area {
      background-color: green;
      display: none;
    }

    div.display_block {
      display: block;
    }

    .reselist button span.display_block {
      display: block;
    }

    /*セレクトタグのデザイン用クラス、width以外はindex.cssで設定*/
    div.select_mark {
      width: 60%;
    }
  </style>
</head>

<body>
  @section('content')
  @auth
  <div class="main">
    <div class="left_part">
      <h3>予約状況</h3>
      <!--予約情報の表示-->
      @foreach($my_reservations as $my_reservation)
      <div class="reselist">
        <form action="/reservation/del" method="post" name="rese_form" class="rese_del_form">
          @csrf
          <div class="reselist_head">
            <h4>予約{{$loop->iteration}}</h4>
            <div class="rese_del_button"><button></button></div>
          </div>
          <!--予約削除-->
          <dl class="rese_del reselist_dl">
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
        <!--予約変更-->
        <button type="button" class="change"><span class="display_block">予約の変更</span><span>閉じる</span></button>
        <div class="change_area">
          <p>変更後の日時および人数を選択してください</p>
          <form action="/reservation/change" method="post" class="rese_change_form">
            @csrf
            <input type="hidden" name="rese_id" value="{{$my_reservation->id}}">
            <dl class="reselist_dl">
              <dt>Date Change</dt>
              <dd><input type="date" name="change_date" id="date" value="{{$my_reservation->getDate()}}"></dd>
              <dt>Time Change</dt>
              <dd>
                <div class="select_mark"><select name="change_time">
                    <option value="{{$my_reservation->getTime()}}">{{$my_reservation->getTime()}}</option>
                    @for($i=17; $i < 23 ; $i++ ) <option value="{{$i.':'.'00'}}">{{$i.':'.'00'}}</option>
                      <option value="{{$i.':'.'30'}}">{{$i.':'.'30'}}</option>
                      @endfor
                  </select></div>
              </dd>
              <dt>Number Change</dt>
              <dd>
                <div class="select_mark"><select name="change_number">
                    <option value="{{$my_reservation->number}}">{{$my_reservation->number}}</option>
                    @for($i=1; $i < 11 ; $i++ ) <option value="{{$i}}">{{$i . '人'}}</option>
                      @endfor
                  </select></div>
              </dd>
              <dt></dt>
              <dd><button type="submit" class="bluetype rese_change">変更する</button></dd>
            </dl>
          </form>
        </div>
      </div>
      @endforeach
    </div>

    <div class="right_part">
      <div class="favorite_part">
        <!--ログイン状態での閲覧-->
        <h2>{{$user->name}}さん</h2>
        <h3>お気に入り店舗</h3>
        <div class="favorite_part_content">
          @foreach($my_favorites as $my_favorite)
          <!--以下、表示-->
          <div class="shop_card">
            <div class="shop_card_image"><img src="{{$my_favorite->shop->image}}" alt="img"></div>
            <div class="shop_card_content">
              <h3>{{$my_favorite->shop->name}}</h3>
              <p><span>#{{$my_favorite->shop->getArea()}}</span><span>#{{$my_favorite->shop->getGenre()}}</span></p>
              <div class="forms">
                <!--飲食店詳細ページへのリンク-->
                <form action="/detail/{{$my_favorite->shop->id}}" method="get">
                  <button class="bluetype">詳しく見る</button>
                </form>
                <!--お気に入りの表示・削除-->
                <form action="/favorite/del" method="post">
                  @csrf
                  <input type="hidden" name="shop_id" value="{{$my_favorite->shop->id}}">
                  <button class="favorite_mark"></button>
                  <span class="favorite_expl">お気に入り解除</span>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        @endauth
      </div>
    </div>
  </div>
  <script src="{{ asset('js/mypage.js') }}"></script>
  @endsection
</body>

</html>