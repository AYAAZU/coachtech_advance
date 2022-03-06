<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FromShopNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Build the message.
     * 
     *後で追加？？？？？
     * ->view('emails.notification_from_shop')

     * @return $this
     */
    public function build()
    {
        return $this
        ->text('emails.notification_from_shop')
        ->subject($this->title)
        ->with([
                'text' => $this->text,
            ]);
    }
}
