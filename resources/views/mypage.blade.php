<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Mypage</title>
  <!-- Style -->
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
  @extends('layouts.default')
</head>

<body>
  @section('content')
  @auth
  <div class="main">
    <div class="left_part">
      <!--口コミの投稿-->
      @if($reservations_visited->count() >= 1)
      <h3>■口コミの投稿</h3>
      <p>下記店舗の口コミを投稿できます。店名をクリックしてください。</p>
      <br>
      <ul>
        @foreach($reservations_visited as $reservation_visited)
        <li>
          <button class="review round">{{$reservation_visited->shop->name}}</button>
          <form action="/review/create" method="post" class="review_form display_none">
            @csrf
            <input type="hidden" name="reservation_id" value="{{$reservation_visited->id}}" required>
            <p>・5段階で評価してください（必須）</p>
            <select name="stars" id="">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select><br><br>
            <p>・感想を書いてください（200文字まで）</p>
            <textarea name="comment" id="" cols="20" rows="8" maxlength="200"></textarea><br>
            <button type="submit">評価する</button>
          </form>
        </li>
        @endforeach
      </ul><br>
      @endif

      <h3>■予約状況</h3>
      <!--予約情報の表示-->
      <div>
        @foreach ($errors->all() as $error)
        <li class="alert">{{$error}}</li>
        @endforeach
      </div>
      @foreach($reservations as $reservation)
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
            <dd>{{$reservation->shop->getShopName()}}</dd>
            <dt>Date</dt>
            <dd>{{$reservation->getDate()}}</dd>
            <dt>Time</dt>
            <dd>{{$reservation->getTime()}}</dd>
            <dt>Number</dt>
            <dd>{{$reservation->number}}人</dd>
          </dl>
          <input type="hidden" name="rese_id" value="{{$reservation->id}}">
        </form>
        <!--QRコード-->
        <div class="qr">
          <form action="/generate-qrcode/{{$reservation->id}}" method="get">
            <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
            <button>QRコード表示</button>
          </form>
        </div>
        <!--予約変更-->
        <button type="button" class="change"><span class="display_block">予約の変更</span><span class="display_none">閉じる</span></button>
        <div class="change_area display_none">
          <p>変更後の日時および人数を選択してください</p>
          <form action="/reservation/change" method="post" class="rese_change_form">
            @csrf
            <input type="hidden" name="rese_id" value="{{$reservation->id}}">
            <dl class="reselist_dl">
              <dt>Date Change</dt>
              <dd><input type="date" name="change_date" id="date" value="{{$reservation->getDate()}}"></dd>
              <dt>Time Change</dt>
              <dd>
                <div class="select_mark"><select name="change_time">
                    <option value="{{$reservation->getTime()}}">{{$reservation->getTime()}}</option>
                    @for($i=17; $i < 23 ; $i++ ) <option value="{{$i.':'.'00'}}">{{$i.':'.'00'}}</option>
                      <option value="{{$i.':'.'30'}}">{{$i.':'.'30'}}</option>
                      @endfor
                  </select></div>
              </dd>
              <dt>Number Change</dt>
              <dd>
                <div class="select_mark"><select name="change_number">
                    <option value="{{$reservation->number}}">{{$reservation->number}}</option>
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
        <h2>{{$user->name}}さん</h2>
        <h3>■お気に入り店舗</h3><br>
        <div class="favorite_part_content">
          @foreach($my_favorites as $my_favorite)
          <!--以下、表示-->
          <div class="shop_card">
            <div class="shop_card_image">
              <img src="/storage/shop_image/{{$my_favorite->shop->image}}" alt="shop image">
            </div>
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