<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::active()->ordered()->get();
        return view('experts.index', compact('experts'));
    }

    public function show($id)
    {
        $expert = Expert::where('is_active', true)->findOrFail($id);
        return view('experts.show', compact('expert'));
    }

    // Dashboard methods
    public function dashboard()
    {
        $experts = Expert::ordered()->get();
        return view('dashboard.experts.index', compact('experts'));
    }

    public function create()
    {
        return view('dashboard.experts.create');
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
            $imagePath = $request->file('image')->store('experts', 'public');
            $data['image'] = $imagePath;
        }

        Expert::create($data);

        return redirect()->route('dashboard.experts.index')->with('success', 'تم إنشاء الخبير بنجاح');
    }

    public function edit($id)
    {
        $expert = Expert::findOrFail($id);
        return view('dashboard.experts.edit', compact('expert'));
    }

    public function update(Request $request, $id)
    {
        $expert = Expert::findOrFail($id);
        
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
            if ($expert->image) {
                Storage::disk('public')->delete($expert->image);
            }
            
            $imagePath = $request->file('image')->store('experts', 'public');
            $data['image'] = $imagePath;
        }

        $expert->update($data);

        return redirect()->route('dashboard.experts.index')->with('success', 'تم تحديث الخبير بنجاح');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        
        // Delete image if exists
        if ($expert->image) {
            Storage::disk('public')->delete($expert->image);
        }
        
        $expert->delete();

        return redirect()->route('dashboard.experts.index')->with('success', 'تم حذف الخبير بنجاح');
    }
}