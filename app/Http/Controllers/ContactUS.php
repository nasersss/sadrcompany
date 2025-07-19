<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactUS extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        try {
            Mail::send('email.contact', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_query' => $request->get('message'),
            ), function ($message) use ($request) {
                $message->to('Sadrcompanyy@gmail.com', 'Admin')->subject($request->get('subject'));
            });
            return back()->with('success', __('contact.thankMessuage'));
        } catch (\Throwable $th) {
            return back()->with(['error' => __('contact.errorMessage')]);
        }
    }
}
