<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogInMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sub;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sub = 'StudyBuddy Registration Confirmation';
        /* $this-> u_name = $u_name; */
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.login')->subject($this->sub);
    }
}
