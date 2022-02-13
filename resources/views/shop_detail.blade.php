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
    /*幅*/
    .right_part {
      width: 50%;
    }

    .left_part {
      width: 50%;
    }

    /*セレクトタグのデザイン用クラスのwidth、他は親レイアウトで設定*/
    div.select_mark {
      width: 50%;
      margin: 20px;
    }
  </style>
</head>

<body>
  @section('content')
  <div class="header_part">
    <div></div>
  </div>
  <div class="main">
    <div class="left_part">
      <!--飲食店の表示-->
      <div class="shop_detail_card">
        <p><a href="/" class="return"></a><span>{{$shop->name}}</span></p>
        <div class="shop_detail_card_image">
          <img src="{{$shop->image}}" alt="img">
        </div>
        <p><span>#{{$shop->getArea()}}</span><span>#{{$shop->getGenre()}}</span></p>
        <p>{{$shop->info}}</p>
      </div>
    </div>

    <div class="right_part">
      <!--予約機能-->
      <div class="rese_card">
        <!--ログイン状態での閲覧-->
        @auth
        <form action="/reservation/add" method="post" name="rese_form">
          @csrf
          <h3>予約</h3>
          <input type="date" name="date" id="date">
          <div class="select_mark"><select name="time" id="time">
              <option value="">時刻を選択</option>
              @for($i=17; $i < 23 ; $i++ ) <option value="{{$i.':'.'00'}}">{{$i.':'.'00'}}</option>
                <option value="{{$i.':'.'30'}}">{{$i.':'.'30'}}</option>
                @endfor
            </select></div>
          <div class="select_mark"><select name="number" id="number">
              <option value="">人数を選択（最大10人）</option>
              @for($i=1; $i < 11 ; $i++ ) <option value="{{$i}}">{{$i . '人'}}</option>
                @endfor
            </select></div>
          <div class="alert">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </div>
          <dl class="rese_confirmation">
            <dt>Shop</dt>
            <dd>{{$shop->name}}</dd>
            <dt>Date</dt>
            <dd><span id="copydate"></span></dd>
            <dt>Time</dt>
            <dd><span id="copytime"></span></dd>
            <dt>Number</dt>
            <dd><span id="copynumber"></span>人</dd>
          </dl>
          <input type="hidden" name="shop_id" value="{{$shop->id}}">
          <button>予約する</button>
        </form>
        <!--ログアウト状態での閲覧-->
        @else
        <p><a href="{{ route('register') }}">会員登録</a>または<a href="{{ route('login') }}">ログイン</a>してください</p>
        @endauth
      </div>
    </div>
  </div>
  <script src="{{ asset('js/shop_detail.js') }}"></script>
  @endsection
</body>

</html>