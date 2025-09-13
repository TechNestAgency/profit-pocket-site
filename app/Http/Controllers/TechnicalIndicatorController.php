<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechnicalIndicator;
use Illuminate\Support\Facades\Storage;

class TechnicalIndicatorController extends Controller
{
    public function index()
    {
        $technicalIndicators = TechnicalIndicator::active()
            ->published()
            ->latest('published_at')
            ->get();

        return view('technical-indicators.index', compact('technicalIndicators'));
    }

    public function show($id)
    {
        $technicalIndicator = TechnicalIndicator::active()
            ->published()
            ->findOrFail($id);

        return view('technical-indicators.show', compact('technicalIndicator'));
    }

    // Dashboard methods
    public function dashboard()
    {
        $technicalIndicators = TechnicalIndicator::latest()->get();
        return view('dashboard.technical-indicators.index', compact('technicalIndicators'));
    }

    public function create()
    {
        return view('dashboard.technical-indicators.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'nullable|url',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->only(['title', 'description', 'published_at', 'is_active']);

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            $data['category_image'] = $request->file('category_image')->store('technical-indicators', 'public');
        }

        // Handle videos
        if ($request->has('videos')) {
            $videos = array_filter($request->input('videos'));
            $data['videos'] = $videos;
        }

        TechnicalIndicator::create($data);

        return redirect()->route('dashboard.technical-indicators.index')
            ->with('success', 'تم إنشاء المؤشر الفني بنجاح.');
    }

    public function edit($id)
    {
        $technicalIndicator = TechnicalIndicator::findOrFail($id);
        return view('dashboard.technical-indicators.edit', compact('technicalIndicator'));
    }

    public function update(Request $request, $id)
    {
        $technicalIndicator = TechnicalIndicator::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'nullable|url',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->only(['title', 'description', 'published_at', 'is_active']);

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            // Delete old image
            if ($technicalIndicator->category_image) {
                Storage::disk('public')->delete($technicalIndicator->category_image);
            }
            $data['category_image'] = $request->file('category_image')->store('technical-indicators', 'public');
        }

        // Handle videos
        if ($request->has('videos')) {
            $videos = array_filter($request->input('videos'));
            $data['videos'] = $videos;
        }

        $technicalIndicator->update($data);

        return redirect()->route('dashboard.technical-indicators.index')
            ->with('success', 'تم تحديث المؤشر الفني بنجاح.');
    }

    public function destroy($id)
    {
        $technicalIndicator = TechnicalIndicator::findOrFail($id);

        // Delete image
        if ($technicalIndicator->category_image) {
            Storage::disk('public')->delete($technicalIndicator->category_image);
        }

        $technicalIndicator->delete();

        return response()->json(['success' => true, 'message' => 'تم حذف المؤشر الفني بنجاح']);
    }
}
