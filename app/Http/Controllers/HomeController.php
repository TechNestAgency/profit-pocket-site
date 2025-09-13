<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->take(4)->get();
        $settings = Setting::getGroup('general');
        $socialSettings = Setting::getGroup('social');
        return view('home', compact('services', 'settings', 'socialSettings'));
    }
}
