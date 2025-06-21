<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|min:3',
            'email'   => 'required|email',
            'message' => 'required|string|min:5',
        ]);

        try {
            Mail::to('gulfarazkhanniazi3@gmail.com')->send(new ContactMessage($validated));
            return back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    }
}
