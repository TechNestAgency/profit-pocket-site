<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        return view('services.index', compact('services'));
    }

    public function show($id)
    {
        $service = Service::where('is_active', true)->findOrFail($id);
        return view('services.show', compact('service'));
    }

    // Dashboard methods
    public function dashboard()
    {
        $services = Service::ordered()->get();
        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = 'images/services/' . $imageName;
        }

        Service::create($data);

        return redirect()->route('dashboard.services.index')->with('success', 'تم إنشاء الخدمة بنجاح');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                $oldImagePath = public_path($service->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = 'images/services/' . $imageName;
        }

        $service->update($data);

        return redirect()->route('dashboard.services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        // Delete image if exists
        if ($service->image) {
            $imagePath = public_path($service->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $service->delete();

        return redirect()->route('dashboard.services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}