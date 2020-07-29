<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Receive extends Mailable
{
    use Queueable, SerializesModels;

    protected $sellmail;
    protected $poolmail ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sellmail,$poolmail)
    {
        $this->sellmail = $sellmail;
        $this->poolmail = $poolmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Matching Station運営事務局です')
        ->view('email/receive_mail')
        ->with(['sellmail' => $this->sellmail,'poolmail' => $this->poolmail]);
    }
}
