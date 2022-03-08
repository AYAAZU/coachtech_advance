<head>
  <title>Rese</title>
  @extends('layouts.default')
</head>

<body>
  <!-- Session Status -->
  <!-- Validation Errors-->
  @section('content_auth')
  <div class="window_box_container">
    <div class="window_box">
      <div class="window_box_done">
        <p>送信完了</p>
        <p><a href="/adminshop/reservations" class="bluetype">予約一覧に戻る</a></p>
      </div>
    </div>
  </div>
  @endsection
</body>