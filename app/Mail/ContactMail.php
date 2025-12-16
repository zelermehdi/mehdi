<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public function __construct(public array $data) {}

    public function build()
    {
        $label = $this->data['subject'] === 'privatisation'
            ? 'Privatisation'
            : 'Information';

        return $this->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->replyTo($this->data['email'])
            ->subject("Contact Verre Gule - {$label}")
            ->view('emails.contact')
            ->with([
                'd' => $this->data,
                'label' => $label,
            ]);
    }
}
