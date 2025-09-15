<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    public function show($id)
    {
        $testimonial = Testimonial::where('is_active', true)->findOrFail($id);
        return view('testimonials.show', compact('testimonial'));
    }

    // Dashboard methods
    public function dashboard()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'opinion' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/testimonials'), $imageName);
            $data['image'] = 'images/testimonials/' . $imageName;
        }

        Testimonial::create($data);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم إنشاء الشهادة بنجاح');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'opinion' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image) {
                $oldImagePath = public_path($testimonial->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/testimonials'), $imageName);
            $data['image'] = 'images/testimonials/' . $imageName;
        }

        $testimonial->update($data);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم تحديث الشهادة بنجاح');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        // Delete image if exists
        if ($testimonial->image) {
            $imagePath = public_path($testimonial->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')->with('success', 'تم حذف الشهادة بنجاح');
    }
}
