<?php

namespace App\Mail;

use App\Models\UserASDEN;
use Illuminate\Mail\Mailable;

class PasswordResetMail extends Mailable
{
    public function __construct(public UserASDEN $user, public string $token) {}

    public function build()
    {
        return $this->subject('Restablece tu contraseña')
            ->view('emails.password-reset')
            ->with([
                'url' => route('password.reset', $this->token),
            ]);
    }
}
