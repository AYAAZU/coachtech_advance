<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StripeController;

/*飲食店一覧（ホーム画面）、飲食店詳細*/
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'shop_detail']);

/*マイページ*/
Route::get('/mypage', [UserController::class, 'mypage']);

/*レビュー*/
Route::post('/review/create', [ReviewController::class, 'review_create']);
Route::get('/review/show/{shop_id}', [ReviewController::class, 'review_show']);

/*予約*/
Route::post('/reservation/add', [ReservationController::class, 'rese_create']);
Route::post('/reservation/del', [ReservationController::class, 'rese_destroy']);
Route::post('/reservation/change', [ReservationController::class, 'rese_update']);

/*お気に入り*/
Route::post('/favorite/add', [ShopController::class, 'favorite_add']);
Route::post('/favorite/del', [ShopController::class, 'favorite_del']);

/*QRコード発行*/
Route::get('/generate-qrcode/{reservation_id}', [QrCodeController::class, 'index']);
Route::get('/reservationinfo/{reservation_id}', [QrCodeController::class, 'qrcode_result']);

/*Stripe*/
Route::post('/stripe', [StripeController::class, 'index_stripe']);
Route::post('/charge', [StripeController::class, 'charge'])->name('stripe.charge');

/*店舗代表者*/
Route::get('/admin', [UserController::class, 'admin_service']);
Route::get('/adminshop', [UserController::class, 'admin_shop']);
Route::post('/adminshop/create', [ShopController::class, 'shop_data_create']);
Route::post('/adminshop/update', [ShopController::class, 'shop_data_update']);
Route::post('/adminshop/image', [ShopController::class, 'shop_image_add']);
Route::get('/adminshop/reservations', [ReservationController::class, 'shop_reservations']);
Route::post('/make_mail', [ReservationController::class, 'make_mail']);
Route::post('/mail', [MailSendController::class, 'send']);

/*以下、データのインポート*/
Route::get('/shops', [ShopController::class, 'index_import']);
Route::post('/shops', [ShopController::class, 'import']);

Route::get('/image', [ShopController::class, 'image']);
Route::post('/image', [ShopController::class, 'image_save']);
/*以上、データのインポート*/

require __DIR__.'/auth.php';
