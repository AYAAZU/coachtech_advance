<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Shop;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
/*use Carbon\Carbon;*/


use App\Imports\ShopsImport;
use Maatwebsite\Excel\Facades\Excel;


class ShopController extends Controller
{
    /*飲食店一覧の表示*/
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('welcome', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres]);
    }
    /*飲食店検索結果の表示*/
    public function serch(Request $request)
    {
        $area_id = Area::where('name', $request->area_name);
        $shops = Shop::where('area_id', $area_id)->all();
        return view('welcome', ['shops' => $shops]);
    }

    /*飲食店の詳細*/
    public function shop_detail($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        $dt_reserved = Reservation::where('shop_id', $shop_id)->get();
        $dt_reserved_start = Reservation::where('shop_id', $shop_id)->get();
        return view('shop_detail', ['shop' => $shop, 'dt_reserved' => $dt_reserved]);
    }

    /*予約の追加（作成前）*/
    public function rese_add(StoreReservationRequest $request)
    {
        /*all取得し、認証中ユーザーのIDと日時を追加*/
        /*$rese_all = $request->all();
        /*　"_token"削除は必要？？　*/
        /*unset($rese_all['_token']);
        /*$user_id = Auth::id();
        /*$rese_all['user_id'] = $user_id;
        /*$rese_all['start_datetime'] = $request->date . ' ' . $request->time;*/

    
        /*dd($rese_all);*/

        // /*　"_token"削除？？　*/
        /*array:"_token","shop_id","date","time","number"
        +'user_id','datetime'*/

        /*認証中ユーザーのID、飲食店のID、予約日時、人数を取得*/
        $shop_id = $request->shop_id;
        $user_id = Auth::id();
        $number = $request->number;
        $start_datetime = $request->date . ' ' . $request->time;
        /*予約の追加*/
        Reservation::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'number' => $number,
            'start_datetime' => $start_datetime
        ]);

        return view('reserve_done');
    }

    /*予約の削除（確認前）*/
    public function rese_del(Request $request)
    {
        /*予約の削除 デリート？ソフトデリート？*/

        $rese_id = $request->rese_id;
        Reservation::find($rese_id)->delete();


        return redirect('/mypage');
    }

    /*以下、データのインポート*/
    public function index_import()
    {
        return view('index');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ShopsImport, $file);

        return redirect('/shops')->with('success', 'All good!');
    }
}
