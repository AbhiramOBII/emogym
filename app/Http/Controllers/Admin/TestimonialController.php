<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'story' => 'required|string|max:2000',
            'order' => 'nullable|integer|min:0',
            'is_approved' => 'boolean',
        ]);

        $testimonial->update([
            'name' => $validated['name'],
            'occupation' => $validated['occupation'] ?? null,
            'rating' => $validated['rating'],
            'story' => $validated['story'],
            'order' => $validated['order'] ?? 0,
            'is_approved' => $request->has('is_approved'),
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => true]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial approved successfully.');
    }

    public function reject(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => false]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial rejected successfully.');
    }
}
