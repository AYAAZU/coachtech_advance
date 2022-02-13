<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rese</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- fontawesome旧バージョン※検索用虫眼鏡マークのため -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    @extends('layouts.default')
</head>
<style>
    /*セレクトタグのデザイン用クラスのwidth、他は親レイアウトで設定*/
    div.select_mark {
        width: 100px;
    }
</style>

<body>
    @section('content')
    <div class="header_part">
        <!--飲食店の検索-->
        <div class="shop_serch">
            <form action="" method="get" name="shop_serch">
                <div class="select_mark"><select name="area_keyword" id="area_keyword">
                        <option value="All area">All area</option>
                        @foreach($areas as $area)
                        <option value="{{$area->name}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select_mark"><select name="genre_keyword" id="genre_keyword">
                        <option value="All genre">All genre</option>
                        @foreach($genres as $genre)
                        <option value="{{$genre->name}}">{{$genre->name}}</option>
                        @endforeach
                    </select></div><input type="searc" name="name_keyword" id="name_keyword" placeholder="&#xf002; Search...">
            </form>
        </div>
    </div>

    <div class="main">
        <div class="shop_cards_container">
            <!--飲食店一覧-->
            <ul class="shop_cards">
                @foreach($shops as $shop)
                <li class="shop_card">
                    <!--飲食店検索のための情報なので非表示-->
                    <div class="for_shop_serch">
                        <span class="for_serch_area hidden_tag">{{$shop->getArea()}}</span>
                        <span class="for_serch_genre hidden_tag">{{$shop->getGenre()}}</span>
                        <span class="for_serch_name hidden_tag">{{$shop->name}}</span>
                        <span class="for_serch_kana hidden_tag">{{$shop->kana}}</span>
                    </div>
                    <!--以下、表示-->
                    <div class="shop_card_image"><img src="{{$shop->image}}" alt="shop image"></div>
                    <div class="shop_card_content">
                        <h3>{{$shop->name}}</h3>
                        <p><span>#{{$shop->getArea()}}</span><span>#{{$shop->getGenre()}}</span></p>
                        <div class="forms">
                            <!--飲食店詳細ページへのリンク-->
                            <form action="/detail/{{$shop->id}}" method="get">
                                <button class="bluetype">詳しく見る</button>
                            </form>
                            <!--お気に入りの表示・登録・削除-->
                            @auth
                            @if($shop->favorites->contains('user_id', Auth::id()))
                            <form action="/favorite/del" method="post">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                <button class="favorite_mark"></button>
                                <span class="favorite_expl">お気に入り解除</span>
                            </form>
                            @else
                            <form action="/favorite/add" method="post">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                <button class="not_favorite_mark"></button>
                                <span class="favorite_expl">お気に入り登録</span>
                            </form>
                            @endif
                            @else
                            <!--お気に入りの表示なし-->
                            @endauth
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!--jsファイルの読み込み-->
        <script src="{{ asset('js/welcome.js') }}"></script>
    </div>
    @endsection
</body>

</html>