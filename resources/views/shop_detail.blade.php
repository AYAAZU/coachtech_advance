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
  </style>
</head>

<body>
  @section('content')
  <div class="right_part">
    <!--予約機能-->
    <div class="rese_card">
      <h2>予約　※データ保持、エラー日本語化、日時被りチェックは未対応！！</h2>
      <!--ログイン状態での閲覧-->
      @auth
      <form action="" method="" name="rese_form_copy">
        @csrf
        <input type="date" name="copydate" id="copydate" onchange="copyinfo()">
        <select name="copytime" onchange="copyinfo()">
          <option value="">ご予約の時刻を選択してください</option>
          @for($i=17; $i < 23 ; $i++ ) 
          <option value="{{$i.':'.'00'}}">{{$i.':'.'00'}}</option>
          <option value="{{$i.':'.'30'}}">{{$i.':'.'30'}}</option>
          @endfor
        </select>
        <select name="copynumber" onchange="copyinfo()">
          <option value="">人数を選択してください（最大10人）</option>
          @for($i=1; $i < 11 ; $i++ ) <option value="{{$i}}">{{$i . '人'}}</option>
            @endfor
        </select>
        <br>
      </form>
      <form action="/reservation/add" method="post" name="rese_form">
        @csrf
        <dl class="rese_confirmation">
          <dt>Shop</dt>
          <dd>{{$shop->name}}</dd>
          <dt>Date</dt>
          <dd><input type="text" name="date"></dd>
          <dt>Time ※text?</dt>
          <dd><input type="text" name="time"></dd>
          <dt>Number</dt>
          <dd><input type="number" name="number">人</dd>
        </dl>
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <button type="submit">予約する</button>
        <div class="alert">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </div>
      </form>

      <script type="text/javascript">
        /*明日以降の日付のみ入力可*/
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var yyyy = tomorrow.getFullYear();
        var mm = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
        var dd = ("0" + tomorrow.getDate()).slice(-2);

        /*デフォルト値不要なら消す*/
        document.getElementById("copydate").min = yyyy + '-' + mm + '-' + dd;

        /*入力値を下段に反映*/
        function copyinfo() {
          document.rese_form.date.value = document.rese_form_copy.copydate.value;
          document.rese_form.time.value = document.rese_form_copy.copytime.value;
          document.rese_form.number.value = document.rese_form_copy.copynumber.value;
        }
      </script>

      <!--ログアウト状態での閲覧-->
      @else
      <p><a href="{{ route('register') }}">会員登録</a>または<a href="{{ route('login') }}">ログイン</a>してください</p>
      @endauth
    </div>
  </div>

  <div class="left_part">
    <!--飲食店の表示-->
    <div class="shop_card">
      <!--飲食店一覧ページへのリンク？？-->
      <p><a href="/" class="return">＜（戻る）</a><span>{{$shop->name}}</span></p>
      <!--後でCSSに変更--><br>
      <div class="shop_image">
        <img src="{{$shop->image}}" alt="img">
      </div>
      <!--後でCSSに変更--><br>
      <p><span>#{{$shop->getArea()}}</span><span>#{{$shop->getGenre()}}</span></p>
      <!--後でCSSに変更--><br>
      <p>{{$shop->info}}</p>
    </div>
  </div>
</body>

</html>