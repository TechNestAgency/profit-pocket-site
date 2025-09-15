<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin_logged_in')) {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $stats = [
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
        ];

        $recent_contacts = Contact::latest()
            ->limit(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recent_contacts'));
    }


    public function contacts()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard.contacts', compact('contacts'));
    }

    public function settings()
    {
        $settings = Setting::getGroup('general');
        $socialSettings = Setting::getGroup('social');
        return view('dashboard.settings', compact('settings', 'socialSettings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'telegram_url' => 'nullable|url|max:255',
            'snapchat_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'new_email' => 'nullable|email|max:255',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        // Handle admin account changes
        if ($request->filled('new_email') || $request->filled('new_password')) {
            $adminUserId = session('admin_user_id');
            
            if ($adminUserId) {
                $user = User::find($adminUserId);
                
                if ($user) {
                    // Update password if provided
                    if ($request->filled('new_password')) {
                        $user->password = Hash::make($request->new_password);
                    }
                    
                    // Update email if provided
                    if ($request->filled('new_email')) {
                        $user->email = $request->new_email;
                        session(['admin_email' => $request->new_email]);
                    }
                    
                    $user->save();
                }
            } else {
                // Handle fallback admin (no user in database)
                if ($request->filled('new_password')) {
                    // For fallback admin, we'll store the new password in settings
                    Setting::set('admin_password', Hash::make($request->new_password));
                }
                
                if ($request->filled('new_email')) {
                    session(['admin_email' => $request->new_email]);
                    Setting::set('admin_email', $request->new_email);
                }
            }
        }

        Setting::setGroup('general', $request->only([
            'site_name', 'site_description', 'contact_email', 'contact_phone', 'address'
        ]));

        Setting::setGroup('social', $request->only([
            'facebook_url', 'telegram_url', 'snapchat_url', 'youtube_url', 'twitter_url'
        ]));

        return redirect()->back()->with('success', 'تم حفظ الإعدادات بنجاح.');
    }


    // Contact Management Methods
    public function replyContact(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'reply' => 'required|string'
        ]);

        $contact->markAsReplied($request->reply);

        return response()->json(['success' => true, 'message' => 'تم إرسال الرد بنجاح']);
    }

    public function destroyContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['success' => true, 'message' => 'تم حذف الاستفسار بنجاح']);
    }
}
