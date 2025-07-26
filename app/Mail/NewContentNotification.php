<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewContentNotification extends Mailable
{
    public $content;
    public $type;
    public $subscriber;

    /**
     * Create a new message instance.
     */
    public function __construct($content, string $type, $subscriber)
    {
        $this->content = $content;
        $this->type = $type;
        $this->subscriber = $subscriber;
    }

    public function build()
    {
        $view = 'emails.' . $this->type; // Ej: emails.new, emails.job
        $subject = match ($this->type) {
            'new' => '¡Nueva noticia publicada!',
            'post' => '¡Nuevo blog publicado!',
            'job'  => '¡Nueva oferta laboral publicada!',
            'project' => '¡Nuevo proyecto publicado!'
        };
        
        $unsubscribeUrl = route('unsubscribe', [
            'token' => $this->subscriber->unsubscribe_token,
        ]);

        return $this->subject($subject)
            ->view($view)
            ->with([
                'content' => $this->content,
                'unsubscribeUrl' => $unsubscribeUrl,
            ]);
    }
}
