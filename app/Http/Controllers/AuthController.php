<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Try to find user in database
        $user = User::where('email', $request->email)
                   ->where('is_active', true)
                   ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('admin_logged_in', true);
            Session::put('admin_user_id', $user->id);
            Session::put('admin_email', $user->email);
            Session::put('admin_name', $user->name);
            return redirect()->route('dashboard.index');
        }

        // Fallback to predefined credentials for backward compatibility
        $fallbackEmail = Setting::get('admin_email', 'admin@profitpocket.com');
        $fallbackPassword = Setting::get('admin_password');
        
        if ($request->email === $fallbackEmail) {
            // Check if custom password is set
            if ($fallbackPassword && Hash::check($request->password, $fallbackPassword)) {
                Session::put('admin_logged_in', true);
                Session::put('admin_email', $request->email);
                Session::put('admin_name', 'Admin');
                return redirect()->route('dashboard.index');
            } elseif (!$fallbackPassword && $request->password === 'admin123') {
                // Default password if no custom password is set
                Session::put('admin_logged_in', true);
                Session::put('admin_email', $request->email);
                Session::put('admin_name', 'Admin');
                return redirect()->route('dashboard.index');
            }
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة'
        ]);
    }

    public function logout()
    {
        Session::forget(['admin_logged_in', 'admin_user_id', 'admin_email', 'admin_name']);
        return redirect()->route('login');
    }
}
