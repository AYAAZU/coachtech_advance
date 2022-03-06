<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*予約の追加*/
    public function rese_create(StoreReservationRequest $request)
    {
        /*認証中ユーザーのID、飲食店のID、予約日時、人数を取得*/
        $shop_id = $request->shop_id;
        $user_id = Auth::id();
        $number = $request->number;
        $start_datetime = date('Y-m-d H:i', strtotime($request->date . ' ' . $request->time));
        /*予約の追加*/
        Reservation::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'number' => $number,
            'start_datetime' => $start_datetime
        ]);
        return view('reserve_done');
    }

    /*予約の削除*/
    public function rese_destroy(Request $request)
    {
        $rese_id = $request->rese_id;
        Reservation::find($rese_id)->delete();
        return redirect('/mypage');
    }

    /*予約の変更*/
    public function rese_update(UpdateReservationRequest $request)
    {
        $rese_id = $request->rese_id;

        $change_start_datetime = $request->change_date . ' ' . $request->change_time;

        Reservation::find($rese_id)->update([
            'number' => $request->change_number,
            'start_datetime' => $change_start_datetime,
        ]);

        return redirect('/mypage');
    }

    /*店舗代表者向け予約一覧表示　*/
    public function shop_reservations()
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_shop');

        /*店舗ID取得　*/
        $shop = Shop::where('admin_user_id', Auth::id())->first();
        if($shop == null){
            $shop_id = null;
        }else{
            $shop_id = $shop->id;
        }

        /*本日の予約を取得、日時による昇順に並べる　*/
        $today = Carbon::today();
        $today_reservations = Reservation::where('shop_id', $shop_id)->where('start_datetime', $today)->get()->sortBy('start_datetime');

        /*明日以降の予約を取得、日時による昇順に並べる　*/
        $today = Carbon::today();
        $future_reservations = Reservation::where('shop_id', $shop_id)->where('start_datetime', '>', $today)->get()->sortBy('start_datetime');
        
        /*過去の予約を取得、日時による昇順に並べる　*/
        $past_reservations = Reservation::where('shop_id', $shop_id)->where('start_datetime', '<', $today)->get()->sortBy('start_datetime');

        return view('admin_shop_reservation', ['today_reservations' => $today_reservations,'future_reservations' => $future_reservations, 'past_reservations' => $past_reservations]);
    }

    /*予約済ユーザーへのメール作成*/
    public function make_mail(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $user = Reservation::where('id', $reservation_id)->first()->user;

        return view('mail_input_form',['user' => $user,]);
    }
}
