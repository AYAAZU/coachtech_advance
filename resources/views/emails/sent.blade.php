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