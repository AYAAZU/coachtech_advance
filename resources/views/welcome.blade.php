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
        div.shop_cards {
            width: 50%;
        }

        div.shop_card {
            width: 100%;
        }

        .shop_image img {
            width: 100%;
        }
    </style>
</head>

<body>
    @section('content')
    <div class="right_part">
        <!--検索-->
        <div class="shop_serch">
            <form action="" method="get" name="shop_serch">
                <select name="area_designated" onchange="serch()">
                    <option value="All area">All area</option>
                    @foreach($areas as $area)
                    <option value="{{$area->name}}">{{$area->name}}</option>
                    @endforeach
                </select>
                <select name="genre_designated" onchange="serch()">
                    <option value="All genre">All genre</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->name}}">{{$genre->name}}</option>
                    @endforeach
                </select>
                <input type="searc" name="name_designated" id="" onchange="serch()">
            </form>
        </div>
        <h2>※独自なので、やり方要確認！！！</h2>
        <h2>※カタカナ対応は後で！！！</h2>
        <h2>※enter挙動後で確認！！！</h2>
    </div>

    <!--方法、要確認-->
    <script type="text/javascript">
        function serch() {
            const shops_all = document.getElementsByClassName("for_shop_serch");
            Array.from(shops_all).forEach(function(item, index) {
                /*一度、元に戻す*/
                item.style.display = 'block';
            })

            const area_designated = document.shop_serch.area_designated.value;
            const shop_area = document.getElementsByName("for_shop_serch_area");
            for (let i = 0; i < shops_all.length; i++) {
                if (area_designated === 'All area') {
                    shops_all[i].style.display = 'block';
                } else if (area_designated != shop_area[i].value) {
                    shops_all[i].style.display = 'none';
                }
            }

            const genre_designated = document.shop_serch.genre_designated.value;
            const shop_genre = document.getElementsByName("for_shop_serch_genre");
            for (let i = 0; i < shops_all.length; i++) {
                if (genre_designated === 'All genre') {
                    /*何もしない*/
                } else if (genre_designated != shop_genre[i].value) {
                    shops_all[i].style.display = 'none';
                }
            }

            const name_designated = document.shop_serch.name_designated.value;
            const shop_name = document.getElementsByName("for_shop_serch_name");
            const shop_kana = document.getElementsByName("for_shop_serch_kana");

            for (let i = 0; i < shops_all.length; i++) {
                if (shop_name[i].value.indexOf(name_designated) === -1 && shop_kana[i].value.indexOf(name_designated)) {
                    shops_all[i].style.display = 'none';
                }
            }



            console.log(shop_name[0].value.indexOf(name_designated));
        }
    </script>

    <div class="left">
        <!--飲食店の表示-->
        <div class="shop_cards">
            @foreach($shops as $shop)
            <!--作成中-->
            <div class="for_shop_serch">
                <input type="hidden" name="for_shop_serch_area" value="{{$shop->getArea()}}">
                <input type="hidden" name="for_shop_serch_genre" value="{{$shop->getGenre()}}">
                <input type="hidden" name="for_shop_serch_name" value="{{$shop->name}}">
                <input type="hidden" name="for_shop_serch_kana" value="{{$shop->kana}}">
                <div class="shop_card">
                    <div class="shop_image"><img src="{{$shop->image}}" alt="img"></div>
                    <p>{{$shop->name}}</p>
                    <p><span>#{{$shop->getArea()}}</span><span>#{{$shop->getGenre()}}</span></p>
                    <!--飲食店詳細ページへのリンク-->
                    <form action="/detail/{{$shop->id}}" method="get">
                        <!--input type="hidden" name="shop_id" value="{{$shop->id}}"-->
                        <input type="submit" value="詳しく見る">
                    </form>
                    <p>ハート（作成前）</p>
                    <br>
                </div>
            </div>
            @endforeach
        </div>
    </div>




    @endsection
</body>

</html>