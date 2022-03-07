<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function index_stripe(Request $request)
    {

        $reservation = Reservation::find($request->reservation_id);
        return view('stripe_payment',['reservation' => $reservation]);
    }

    public function charge(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name' => 'food',
                    ],
                    
                    'unit_amount' => $request->amount,
                    'currency' => 'jpy',
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/stripe',
            'cancel_url' => 'http://127.0.0.1:8000/',
        ]);



    }

}
