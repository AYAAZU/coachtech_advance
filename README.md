## About rese_matsuda（課題提出として）
user(id=1)はサービス管理者
user(id=2)は「仙人」店舗代表者
user(id=3)は「牛助」店舗代表者
user(id=4)は店舗情報未作成の新規店舗代表者
user(id=5～6)は予約・お気に入り登録ありのサービスのユーザーです。
user(id=7)は予約登録なし・お気に入り登録のみのサービスのユーザーです。
※ログインID（email）、パスワードはUserTableSeeder.phpでご確認頂けますと幸いです。
※デモ結果をコントロールするためファクトリは利用していません。


## About rese_matsuda（以下は一般的なアプリ公開をイメージして作成）

rese_matsuda is a web application to make reservations for restaurants.
rese_matsuda let restaurant users make reservations quickly.
rese_matsuda let restaurateurs manege reservations easily.

## Demonstration

![Demo](the link to image)※upload image to Git Hub in advance

## Features

- Simple function
- Palpable UI

## (Server) Requirements
※ [Laravel](https://readouble.com/laravel/8.x/ja/deployment.html)

* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Installation
* Install Composer on the terminal you use for deployment.
  [Composer](https://getcomposer.org/download/)
* pull this project on the terminal you use for deployment.
    git clone URL
    cd ---the directory the files were copied to---
    git checkout master
* Install this project following directions of the service you use or according to your enviroment.

## Usage

- Restaurant users can make reservations after membership registration requiring their names,email addresses,passwords.
- Restaurateurs can check reservations on the management portal.
- Restaurateurs can make or update information about Restaurants.
- The service manager can add restaurateurs on the admin settings.

## Author

* name:MATSUDA AYA
* E-mail:***@email

## License

rese_matsuda is licensed under the [COACHTECH](https://??).
