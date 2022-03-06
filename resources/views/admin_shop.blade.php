<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Rese_admin</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/admin_shop.css') }}">
  @extends('layouts.default')
</head>

<body>
  @section('content')
  <div class="main">
    <div class="left_part">
      <div class="register_box">
        @if($shop == null)
        <h2>1.店舗情報の登録</h2>
        <form method="POST" action="/adminshop/create">
          @csrf
          <ul>
            <li>
              <!-- Shop Name -->
              <div class="fill_shop_name">
                <input id="name" type="text" name="name" placeholder="店名" required autofocus>
              </div>
            </li>
            <li>
              <!-- Shop Kana -->
              <div class="fill_shop_kana">
                <input id="kana" type="text" name="kana" placeholder="かな" required autofocus>
                <span>バリデーション未設定</span>
              </div>
            </li>
            <li>
            <li>
              <!-- Area -->
              <div class="select_mark"><select name="area_id" id="">
                  <option value="">エリアの選択</option>
                  @foreach($areas as $area)
                  <option value="{{$area->id}}">{{$area->name}}</option>
                  @endforeach
                </select>
              </div>
            </li>
            <li>
              <!-- Genre -->
              <div class="select_mark"><select name="genre_id" id="">
                  <option value="">ジャンルの選択</option>
                  @foreach($genres as $genre)
                  <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endforeach
                </select>
              </div>
            </li>
            <li>
              <!-- Info -->
              <div class="user_fill__info">
                <textarea name="info" id="" placeholder="店舗概要" required cols="30" rows="10"></textarea>
              </div>
            </li>
            <div>
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
        @else
        <h2>1.店舗情報の確認・更新</h2>
        <form method="POST" action="/adminshop/update">
          @csrf
          <ul>
            <li>
              <!-- Shop Name -->
              <div class="fill_shop_name">
                <input id="name" type="text" name="name" value="{{$shop->name}}" placeholder="店名" required autofocus>
              </div>
            </li>
            <li>
              <!-- Shop Kana -->
              <div class="fill_shop_kana">
                <input id="kana" type="text" name="kana" value="{{$shop->kana}}" placeholder="かな" required autofocus>
              </div>
            </li>
            <li>
              <!-- Area -->
              <div class="select_mark"><select name="area_id" id="">
                  <option value="{{$shop->area_id}}">{{$shop->getArea()}}</option>
                  @foreach($areas as $area)
                  <option value="{{$area->id}}">{{$area->name}}</option>
                  @endforeach
                </select>
              </div>
            </li>
            <li>
              <!-- Genre -->
              <div class="select_mark"><select name="genre_id" id="">
                  <option value="{{$shop->genre_id}}">{{$shop->getGenre()}}</option>
                  @foreach($genres as $genre)
                  <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endforeach
                </select>
              </div>
            </li>
            <li>
              <!-- Info -->
              <div class="user_fill__info">
                <textarea name="info" id="" placeholder="店舗概要" required cols="30" rows="10">{{$shop->info}}</textarea>
              </div>
            </li>
            <div>
              <button class="bluetype">更新</button>
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
        @endif
        <h2>2.店舗画像の登録・更新</h2>
        @empty($shop)
        <p>※店舗情報の登録をしてください</p>
        @else
        <div class="shop_image">
          <p>・現在登録されている画像</p>
          @if( $shop->id < 21 ) <img src="{{$shop->image}}" alt="画像はありません">
            @else
            <img src="/storage/shop_image/{{$shop->image}}" alt="画像はありません">
            @endif
        </div>
        <br>
        <p>・登録する画像を選択してください</p>
        <form action="/adminshop/image" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="image" id="" accept="image/png, image/jpeg">
          <button class="bluetype">登録・更新</button>
        </form>
        @endempty
      </div>
    </div>
    <div class="right_part">
      <div class="rese_list">
        <a href="/adminshop/reservations">予約一覧へ</a>
      </div>
    </div>
  </div>
  @endsection

</html>