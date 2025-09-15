<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;
use App\Models\VideoSection;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->take(4)->get();
        $videoSection = VideoSection::where('is_active', true)->first();
        $testimonials = Testimonial::active()->ordered()->take(4)->get();
        $settings = Setting::getGroup('general');
        $socialSettings = Setting::getGroup('social');
        return view('home', compact('services', 'videoSection', 'testimonials', 'settings', 'socialSettings'));
    }
}
