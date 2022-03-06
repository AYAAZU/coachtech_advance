<head>
  <title>Rese_admin</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/admin_shop_reservation.css') }}">
  @extends('layouts.default')
</head>

<body>
  @section('content')
  <div class="main media">
    <div class="left_part">
      <div class="rese_list">
        <h3>■今日の予約一覧</h3>
        @empty($today_reservations->count())
        <p>予約情報はありません</p>
        @else
        <table class="rese_list_table">
          <tr>
            <th>日時</th>
            <th>氏名</th>
            <th>人数</th>
            <th>連絡</th>
          </tr>
          @foreach($today_reservations as $today_reservation)
          <tr>
            <td>{{$today_reservation->getDatetime()}}</td>
            <td>{{$today_reservation->getName()}} 様</td>
            <td>{{$today_reservation->number}}</td>
            <td>
              <form action="/make_mail" method="post">
                @csrf
                <input type="hidden" name="reservation_id" value={{$today_reservation->id}}>
                <button class="email_button"></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @endempty
      </div>

      <div class="rese_list">
        <h3>■明日以降の予約一覧</h3>
        @empty($future_reservations->count())
        <p>予約情報はありません</p>
        @else
        <table class="rese_list_table">
          <tr>
            <th>日時</th>
            <th>氏名</th>
            <th>人数</th>
            <th>連絡</th>
          </tr>
          @foreach($future_reservations as $future_reservation)
          <tr>
            <td>{{$future_reservation->getDatetime()}}</td>
            <td>{{$future_reservation->getName()}} 様</td>
            <td>{{$future_reservation->number}}</td>
            <td>
              <form action="/make_mail" method="post">
                @csrf
                <input type="hidden" name="reservation_id" value={{$future_reservation->id}}>
                <button class="email_button"></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @endempty
      </div>

      <div class="rese_list">
        <h3>■過去の予約一覧</h3>
        @empty($past_reservations->count())
        <p>予約情報はありません</p>
        @else
        <table class="rese_list_table">
          <tr>
            <th>日時</th>
            <th>氏名</th>
            <th>人数</th>
            <th>連絡</th>
          </tr>
          @foreach($past_reservations as $past_reservation)
          <tr>
            <td>{{$past_reservation->getDatetime()}}</td>
            <td>{{$past_reservation->getName()}} 様</td>
            <td>{{$past_reservation->number}}</td>
            <td>
              <form action="/make_mail" method="post">
                @csrf
                <input type="hidden" name="reservation_id" value={{$past_reservation->id}}>
                <button class="email_button"></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @endempty
      </div>
    </div>
  </div>
  @endsection

  </html>