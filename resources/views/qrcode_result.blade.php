<head>
  <title>予約情報</title>
  <!-- Styles -->
  @extends('layouts.default')
</head>
<body>
  @section('content')
  <div class="main">
    <div class="left_part">
      <h3>予約情報</h3>
      <ul>
        <li>店名：{{$reservation->shop->name}}</li>
        <li>予約者：{{$reservation->getName()}}　様</li>
        <li>日時：{{$reservation->getDatetime()}}</li>
        <li>人数：{{$reservation->number}}名様</li>
      </ul><br>
      <a href="/">HOMEへ戻る</a>
    </div>
  </div>
</body>

