<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGeneratedPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $generatedPassword;

    public function __construct($user, $generatedPassword)
    {
        $this->user = $user;
        $this->generatedPassword = $generatedPassword;
    }

    public function build()
    {
        return $this->subject('Your Account Login Credentials')
            ->view('emails.generated-password');
    }
}
