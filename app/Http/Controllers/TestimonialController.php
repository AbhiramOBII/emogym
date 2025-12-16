<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Store a new testimonial submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'story' => 'required|string|max:2000',
        ]);

        Testimonial::create([
            'name' => $validated['name'],
            'occupation' => $validated['occupation'] ?? null,
            'rating' => $validated['rating'],
            'story' => $validated['story'],
            'is_approved' => false,
        ]);

        return back()->with('success', __('home.testimonial_submitted'));
    }
}
