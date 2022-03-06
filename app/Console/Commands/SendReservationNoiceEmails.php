<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationNotification;
use App\Models\Reservation;
use Carbon\Carbon;

class SendReservationNoiceEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:todays_reservations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '当日予約についてユーザーへリマインドメールを送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {        
            $today = Carbon::today();
            $tomorrow = Carbon::tomorrow();
            $reservations_today = Reservation::whereDate('start_datetime', '>=', $today)->whereDate('start_datetime', '<', $tomorrow)->get();
            
            foreach($reservations_today as $reservation_today){
                $name = $reservation_today->getName();
                $to = $reservation_today->user->email;
                $shop_name = $reservation_today->shop->name;
                $start_datetime = $reservation_today->start_datetime;

                return Mail::to($to)->send(new ReservationNotification($name, $shop_name, $start_datetime));
            }

    }
}
