<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ReservationNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $shop_name, $start_datetime)
    {
        $this->title = sprintf('%s様、本日はご予約についてご確認ください。', $name);
        $this->shop_name = $shop_name;
        $this->start_datetime = $start_datetime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservation_notification')
        ->text('emails.reservation_notification_plain')
        ->subject($this->title)
        ->with([
            'shop_name' => $this->shop_name,
            'start_datetime' => $this->start_datetime,
            ]);
    }
}
