<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::ordered()->paginate(20);
        return view('admin.gallery.index', compact('items'));
    }

    public function photos()
    {
        $items = Gallery::where('type', 'image')->ordered()->paginate(20);
        return view('admin.gallery.photos', compact('items'));
    }

    public function videos()
    {
        $items = Gallery::where('type', 'video')->ordered()->paginate(20);
        return view('admin.gallery.videos', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'required_if:type,image|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'video_url' => 'required_if:type,video|nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->type === 'image' && $request->hasFile('file')) {
            $path = $request->file('file')->store('gallery/images', 'public');
            $data['file_path'] = $path;
        }

        // Handle video
        if ($request->type === 'video') {
            $data['video_url'] = $validated['video_url'];
            
            // Handle video thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('gallery/thumbnails', 'public');
                $data['thumbnail'] = $thumbnailPath;
            }
        }

        Gallery::create($data);

        // Redirect based on type
        $route = $validated['type'] === 'video' ? 'admin.videos.index' : 'admin.photos.index';
        return redirect()->route($route)
            ->with('success', 'Gallery item created successfully!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'video_url' => 'required_if:type,video|nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Handle image upload
        if ($request->type === 'image' && $request->hasFile('file')) {
            // Delete old image
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            $path = $request->file('file')->store('gallery/images', 'public');
            $data['file_path'] = $path;
            $data['video_url'] = null;
            $data['thumbnail'] = null;
        }

        // Handle video
        if ($request->type === 'video') {
            $data['video_url'] = $validated['video_url'];
            
            // Handle video thumbnail
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail
                if ($gallery->thumbnail) {
                    Storage::disk('public')->delete($gallery->thumbnail);
                }
                $thumbnailPath = $request->file('thumbnail')->store('gallery/thumbnails', 'public');
                $data['thumbnail'] = $thumbnailPath;
            }
            
            // Clear file_path if switching to video
            if ($gallery->type === 'image') {
                if ($gallery->file_path) {
                    Storage::disk('public')->delete($gallery->file_path);
                }
                $data['file_path'] = null;
            }
        }

        $gallery->update($data);

        // Redirect based on type
        $route = $validated['type'] === 'video' ? 'admin.videos.index' : 'admin.photos.index';
        return redirect()->route($route)
            ->with('success', 'Gallery item updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Store type before deletion
        $type = $gallery->type;
        
        // Delete associated files
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        if ($gallery->thumbnail) {
            Storage::disk('public')->delete($gallery->thumbnail);
        }

        $gallery->delete();

        // Redirect based on type
        $route = $type === 'video' ? 'admin.videos.index' : 'admin.photos.index';
        return redirect()->route($route)
            ->with('success', 'Gallery item deleted successfully!');
    }

    /**
     * Set a video as the hero background video
     */
    public function setHero(Gallery $gallery)
    {
        // Only allow videos to be set as hero
        if ($gallery->type !== 'video') {
            return redirect()->route('admin.videos.index')
                ->with('error', 'Only videos can be set as hero background.');
        }

        // Remove hero status from all other videos
        Gallery::where('type', 'video')->update(['is_hero' => false]);

        // Set this video as hero
        $gallery->update(['is_hero' => true]);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Hero background video updated successfully!');
    }

    /**
     * Remove hero status from a video
     */
    public function removeHero(Gallery $gallery)
    {
        $gallery->update(['is_hero' => false]);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Hero background video removed.');
    }
}
