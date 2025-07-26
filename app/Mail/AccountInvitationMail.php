<?php

namespace App\Mail;

use App\Models\UserASDEN;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public UserASDEN $user) {}

    public function build()
    {
        return $this->subject('Completa tu registro')
            ->view('emails.account-invitation', [
                'user' => $this->user,
                'url'  => route('password.setup', $this->user->invitation_token),
            ]);
    }
}
