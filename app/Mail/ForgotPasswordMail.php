<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $reset_password;

    public function __construct($user, $reset_password)
    {
        $this->user = $user;
        $this->reset_password = $reset_password;
    }

    public function build()
    {
        return $this->view('auth.reset_password');
    }
}
