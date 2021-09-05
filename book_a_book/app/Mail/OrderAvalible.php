<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderAvalible extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $admin;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $admin)
    {
        $this->user= $user;
        $this->admin= $admin;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order.avalible')->subject("Commande diponnible  - Book a book");
    }
}
