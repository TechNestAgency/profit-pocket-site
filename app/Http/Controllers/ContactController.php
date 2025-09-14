<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::getGroup('general');
        $socialSettings = Setting::getGroup('social');
        return view('contact', compact('settings', 'socialSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new'
        ]);

        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.');
    }
}
