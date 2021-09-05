<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMade extends Mailable
{
    use Queueable, SerializesModels;

    public $curent_user;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($curent_user, $admin)
    {
        $this->curent_user= $curent_user;
        $this->admin= $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order.made')->subject("Nouvelle Commande - Book a book");
    }
}
