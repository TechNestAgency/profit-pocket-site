<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoSection;

class VideoSectionController extends Controller
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

    /**
     * Display the video section management page
     */
    public function index()
    {
        $videoSection = VideoSection::first();
        return view('dashboard.video-section.index', compact('videoSection'));
    }

    /**
     * Show the form for creating a new video section
     */
    public function create()
    {
        return view('dashboard.video-section.create');
    }

    /**
     * Store a newly created video section
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url|max:500',
        ]);

        // Deactivate any existing video sections
        VideoSection::where('is_active', true)->update(['is_active' => false]);

        VideoSection::create([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
            'is_active' => true,
        ]);

        return redirect()->route('dashboard.video-section.index')
            ->with('success', 'تم إضافة قسم الفيديو بنجاح.');
    }

    /**
     * Show the form for editing the video section
     */
    public function edit($id)
    {
        $videoSection = VideoSection::findOrFail($id);
        return view('dashboard.video-section.edit', compact('videoSection'));
    }

    /**
     * Update the video section
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url|max:500',
        ]);

        $videoSection = VideoSection::findOrFail($id);
        
        $videoSection->update([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect()->route('dashboard.video-section.index')
            ->with('success', 'تم تحديث قسم الفيديو بنجاح.');
    }

    /**
     * Remove the video section
     */
    public function destroy($id)
    {
        $videoSection = VideoSection::findOrFail($id);
        $videoSection->delete();

        return redirect()->route('dashboard.video-section.index')
            ->with('success', 'تم حذف قسم الفيديو بنجاح.');
    }
}
