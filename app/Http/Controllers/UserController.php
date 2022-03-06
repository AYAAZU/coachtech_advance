<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class UserController extends Controller
{
    public function mypage()
    {
        /*★ユーザー認証の確認★　*/
        if (! Auth::check()) {
            return redirect('/login');
        }
        /*ユーザー、今後の予約、お気に入り情報取得　*/
        $today = Carbon::today();
        $user = Auth::user();
        $user_id = $user->id;

        $my_favorites = Favorite::where('user_id', $user_id)->get();

        /*未レビューの予約を全て取得*/
        $reservations_all = Reservation::whereDoesntHave('review')->where('user_id', $user_id)->get()->sortBy('start_datetime');
        /*今後の予約を取得*/
        $reservations = $reservations_all->where('start_datetime', '>=', $today);

        /*未レビューの訪問済予約を取得*/
        $reservations_visited= $reservations_all->where('start_datetime', '<', $today);

        return view('mypage', ['user' => $user, 'reservations' => $reservations, 'my_favorites' => $my_favorites, 'reservations_visited' => $reservations_visited,]);
    }

    /*店舗代表者登録画面の表示　*/
    public function admin_service()
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_service');
        return view('admin_service');
    }

    /*店舗情報登録画面の表示　*/
    public function admin_shop()
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_shop');
        /*エリア、ジャンルの選択肢　*/
        $areas = Area::all();
        $genres = Genre::all();
        /*ショップID取得　*/
        $shop = Shop::where('admin_user_id', Auth::id())->first();
        if($shop != null){
        $shop_id = $shop->id;
        }else{
        $shop_id = null;
        }
        return view('admin_shop', ['shop' => $shop, 'areas' => $areas, 'genres' => $genres, 'shop_id' => $shop_id,]);
    }
}
