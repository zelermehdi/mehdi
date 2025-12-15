<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:120'],
            'phone'   => ['nullable','string','max:30'],
            'subject' => ['required','in:information,privatisation'],
            'message' => ['required','string','max:4000'],
        ]);

        Mail::to(config('site.contact_to'))->send(new ContactMail($data));

        return back()->with('success', 'Message envoyé. Réponse sous 24h maximum.');
    }
}
