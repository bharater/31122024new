<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceOrderMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $order; // Corrected by adding a semicolon.

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Your Order Invoice"; // Corrected the spelling mistake.
        return $this->subject($subject)
                    ->view('admin.invoice.generate-invoice');
    }
}
