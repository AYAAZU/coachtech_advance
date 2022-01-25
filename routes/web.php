<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'shop_detail']);

Route::get('/mypage', [UserController::class, 'mypage']);

Route::post('/reservation/add', [ShopController::class, 'rese_add']);
Route::post('/reservation/del', [ShopController::class, 'rese_del']);

/*　いらないかも
Route::get('/reservation/done}', [ShopController::class, 'rese_done']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

/*以下、データのインポート*/
Route::get('/shops', [ShopController::class, 'index_import']);
Route::post('/shops', [ShopController::class, 'import']);
/*以上、データのインポート*/

require __DIR__.'/auth.php';
