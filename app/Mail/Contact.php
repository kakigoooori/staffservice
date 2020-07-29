<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $usermail;
    protected $poolmail ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usermail,$poolmail)
    {
        $this->usermail = $usermail;
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
        ->view('email/sent_mail')
        ->with(['usermail' => $this->usermail,'poolmail' => $this->poolmail]);
    }
}
