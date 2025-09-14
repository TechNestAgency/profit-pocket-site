<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendation;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::active()
            ->published()
            ->latest('published_at')
            ->get();

        return view('recommendations.index', compact('recommendations'));
    }

    public function show($id)
    {
        $recommendation = Recommendation::active()
            ->published()
            ->findOrFail($id);

        return view('recommendations.show', compact('recommendation'));
    }

    // Dashboard methods
    public function dashboard()
    {
        $recommendations = Recommendation::latest()->get();
        return view('dashboard.recommendations.index', compact('recommendations'));
    }

    public function create()
    {
        return view('dashboard.recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->only(['title', 'description', 'published_at', 'is_active']);

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/recommendations'), $imageName);
            $data['category_image'] = 'images/recommendations/' . $imageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/recommendations/images'), $imageName);
                $images[] = 'images/recommendations/images/' . $imageName;
            }
            $data['images'] = $images;
        }

        Recommendation::create($data);

        return redirect()->route('dashboard.recommendations.index')
            ->with('success', 'تم إنشاء التوصية بنجاح.');
    }

    public function edit($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        return view('dashboard.recommendations.edit', compact('recommendation'));
    }

    public function update(Request $request, $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $data = $request->only(['title', 'description', 'published_at', 'is_active']);

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            // Delete old image
            if ($recommendation->category_image) {
                $oldImagePath = public_path($recommendation->category_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('category_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/recommendations'), $imageName);
            $data['category_image'] = 'images/recommendations/' . $imageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            // Delete old images
            if ($recommendation->images) {
                foreach ($recommendation->images as $image) {
                    $oldImagePath = public_path($image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/recommendations/images'), $imageName);
                $images[] = 'images/recommendations/images/' . $imageName;
            }
            $data['images'] = $images;
        }

        $recommendation->update($data);

        return redirect()->route('dashboard.recommendations.index')
            ->with('success', 'تم تحديث التوصية بنجاح.');
    }

    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // Delete images
        if ($recommendation->category_image) {
            $imagePath = public_path($recommendation->category_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        if ($recommendation->images) {
            foreach ($recommendation->images as $image) {
                $imagePath = public_path($image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $recommendation->delete();

        return response()->json(['success' => true, 'message' => 'تم حذف التوصية بنجاح']);
    }
}
