<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rese_admin</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Styles -->
  @extends('layouts.default')
</head>

<body>
  @section('content')
  <div class="main">
    <div class="left_part">
      <form action="/mail" method="post" class="mail_input_form">
        @csrf
        <div>
          <h3>■{{$user->name}}様へのメールを作成</h3><br>
          <p>★タイトル★</p>
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="text" name="title">
          <p>★本文★</p>
          <textarea name="text" id="" cols="40" rows="10"></textarea>
        </div>
        <button type="submit">送信</button>
      </form>
      <br>
      <div><a href="/adminshop/reservations">予約一覧へ戻る</a></div>
    </div>
  </div>
  @endsection

</html>