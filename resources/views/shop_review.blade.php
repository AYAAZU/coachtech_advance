<head>
  <title>Rese</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/shop_review.css') }}">
  @extends('layouts.default')
</head>

<body>
  @section('content')
  <div class="main">
    <div class="left_part">
      @empty($reviews->count())
      <h3>口コミはまだありません。</h3>
      @endempty
      <!--　レビュー　一覧　-->
      <h2>{{$shop->name}}の口コミ一覧</h2><br>
      <ul>
        @foreach($reviews as $review)
        <li class="shop_reviews">
          <p><span class="small">投稿日：</span>{{$review->created_at()}}</p>
          <!--5段階評価-->
          <div class="stars">
            @if(1 == $review->stars)
            <span class="star">
            @elseif(1 < $review->stars && $review->stars< 2) <span class="star"></span><span class="star_half"></span>
            @elseif($review->stars == 2)
            <span class="star"></span><span class="star"></span>
            @elseif(2 < $review->stars && $review->stars< 3) <span class="star"></span><span class="star"></span><span class="star_half"></span>
                @elseif(3 == $review->stars)
                <span class="star"></span><span class="star"></span><span class="star"></span>
                @elseif(3 < $review->stars && $review->stars< 4) <span class="star"></span><span class="star"></span><span class="star"></span><span class="star_half"></span>
                    @elseif(4 == $review->stars)
                    </span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                    @elseif(4 < $review->stars&& $review->stars< 5) <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star_half"></span>
                        @elseif(5 == $review->stars)
                        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                        @else
                        <!--表示なし-->
                        @endif
                        <span>{{$review->stars}}</span>
          </div>
          <p>{{$review->comment}}</p>
        </li>
        @endforeach
      </ul><br>
      <a href="/">HOMEへ戻る</a>
    </div>
  </div>
  @endsection
</body>