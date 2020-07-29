<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Complete extends Mailable
{
    use Queueable, SerializesModels;

    protected $usermail;
    protected $poolmail;
    protected $pooluser;
    protected $reaction;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usermail,$poolmail,$pooluser,$reaction)
    {
        $this->usermail = $usermail;
        $this->poolmail = $poolmail;
        $this->pooluser = $pooluser;
        $this->reaction = $reaction;
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
        ->view('email/complate_mail')
        ->with(['usermail' => $this->usermail,'poolmail' => $this->poolmail,'pooluser' => $this->pooluser,'reaction' => $this->reaction]);
    }
}
