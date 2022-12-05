<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Información de contacto";
    public $evento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($evento)
    {
        $this->evento = $evento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.correo');
    }
}
