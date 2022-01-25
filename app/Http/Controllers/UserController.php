<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;


class UserController extends Controller
{
    public function mypage()
    {
        /*ユーザー、予約、お気に入り情報取得　*/
        $user_id = Auth::id();
        $user = User::find($user_id);
        $my_reservations = Reservation::where('user_id', $user_id)->get();

        /*$my_favorites = Fav…::where('user_id', $user_id);*/

        return view('mypage', ['user' => $user, 'my_reservations' => $my_reservations]);
        /*, 'my_favorites' => $my_favorites]);*/
    }

}
