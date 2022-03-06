<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class QrCodeController extends Controller
{
    /*QRkコードの表示*/
    public function index($reservation_id)
    {
        $url= url("/reservationinfo/{$reservation_id}");
        return view('qrcode', ['url' => $url,]);
    }

    /*QRkコード読み取りURLから予約情報を表示*/
    public function qrcode_result($reservation_id)
    {
        $reservation = Reservation::where('id',$reservation_id)->first();
        return view('qrcode_result', ['reservation' => $reservation,]);
    }
}
