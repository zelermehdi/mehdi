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
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'phone'   => 'nullable|string|max:20',
        'subject' => 'required|in:information,privatisation',
        'message' => 'required|string',
    ]);

    $to = config('contact.contact_to') ?? config('mail.from.address');

    Mail::to($to)->send(new \App\Mail\ContactMail($data));

return back()->with('contact_success', true);
}


}
