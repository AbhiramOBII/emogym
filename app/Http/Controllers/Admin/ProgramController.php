<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'description_kn' => 'nullable|string',
            'short_description' => 'required|string|max:500',
            'short_description_kn' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'who_is_this_for' => 'nullable|string',
            'who_is_this_for_kn' => 'nullable|string',
            'type' => 'required|in:online,offline',
            'program_type' => 'required|in:current,upcoming',
            'link' => 'required_if:type,online|nullable|url',
            'address' => 'required_if:type,offline|nullable|string',
            'original_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        Program::create($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'description_kn' => 'nullable|string',
            'short_description' => 'required|string|max:500',
            'short_description_kn' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'who_is_this_for' => 'nullable|string',
            'who_is_this_for_kn' => 'nullable|string',
            'type' => 'required|in:online,offline',
            'program_type' => 'required|in:current,upcoming',
            'link' => 'required_if:type,online|nullable|url',
            'address' => 'required_if:type,offline|nullable|string',
            'original_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        $program->update($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
