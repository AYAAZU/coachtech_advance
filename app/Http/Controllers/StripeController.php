<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function index_stripe(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);
        return view('stripe_payment',['reservation' => $reservation]);
    }


    /*単発決済用のコード $request->amount*/
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->amount,
                'currency' => 'jpy'
            ));

            return redirect('/maypage');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }





}
