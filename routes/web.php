<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

/*飲食店一覧（ホーム画面）、飲食店詳細*/
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'shop_detail']);

/*マイページ*/
Route::get('/mypage', [UserController::class, 'mypage']);

/*予約*/
Route::post('/reservation/add', [ShopController::class, 'rese_add']);
Route::post('/reservation/del', [ShopController::class, 'rese_del']);
Route::post('/reservation/change', [ShopController::class, 'rese_change']);

/*お気に入り*/
Route::post('/favorite/add', [ShopController::class, 'favorite_add']);
Route::post('/favorite/del', [ShopController::class, 'favorite_del']);

/*★後で消す★　view確認 'auth.thanks' 'reserve_done'*/
/*Route::get('/test',
function () {
    return view(***);
});*/

/*以下、データのインポート*/
Route::get('/shops', [ShopController::class, 'index_import']);
Route::post('/shops', [ShopController::class, 'import']);
/*以上、データのインポート*/

require __DIR__.'/auth.php';
