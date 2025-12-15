<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public function __construct(public array $data) {}

    public function build()
    {
        $label = $this->data['subject'] === 'privatisation' ? 'Privatisation' : 'Information';

        return $this->subject("Contact Verre Gule — {$label}")
            ->replyTo(config('mail.from.address'))
            ->view('emails.contact')
            ->with(['d' => $this->data, 'label' => $label]);
    }
}
