<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('program')->ordered()->paginate(20);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $programs = Program::where('is_active', true)->orderBy('title')->get();
        return view('admin.banners.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'program_id' => 'nullable|exists:programs,id',
            'button_text' => 'nullable|string|max:50',
            'button_text_kn' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'title_kn' => $validated['title_kn'] ?? null,
            'description' => $validated['description'] ?? null,
            'description_kn' => $validated['description_kn'] ?? null,
            'program_id' => $validated['program_id'] ?? null,
            'button_text' => $validated['button_text'] ?? 'Read More',
            'button_text_kn' => $validated['button_text_kn'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $data['image'] = $path;
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully!');
    }

    public function edit(Banner $banner)
    {
        $programs = Program::where('is_active', true)->orderBy('title')->get();
        return view('admin.banners.edit', compact('banner', 'programs'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'program_id' => 'nullable|exists:programs,id',
            'button_text' => 'nullable|string|max:50',
            'button_text_kn' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'title_kn' => $validated['title_kn'] ?? null,
            'description' => $validated['description'] ?? null,
            'description_kn' => $validated['description_kn'] ?? null,
            'program_id' => $validated['program_id'] ?? null,
            'button_text' => $validated['button_text'] ?? 'Read More',
            'button_text_kn' => $validated['button_text_kn'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $path = $request->file('image')->store('banners', 'public');
            $data['image'] = $path;
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully!');
    }

    public function destroy(Banner $banner)
    {
        // Delete associated image
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully!');
    }
}
