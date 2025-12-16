<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Get hero video for background (prioritize is_hero flag, fallback to first active video)
        $heroVideo = Gallery::where('type', 'video')
            ->where('is_active', true)
            ->where('is_hero', true)
            ->first();
        
        // Fallback to first active video if no hero is set
        if (!$heroVideo) {
            $heroVideo = Gallery::where('type', 'video')
                ->where('is_active', true)
                ->orderBy('order')
                ->first();
        }

        // Get active videos (limit to 6 for carousel)
        $videos = Gallery::where('type', 'video')
            ->where('is_active', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        // Get active services (limit to 6 for preview)
        $services = Service::active()
            ->ordered()
            ->limit(6)
            ->get();

        // Get active current programs with upcoming dates (limit to 3 for homepage)
        $programs = Program::where('is_active', true)
            ->current()
            ->with(['availableDates' => function($query) {
                $query->where('start_date', '>=', now())
                      ->orderBy('start_date')
                      ->limit(1)
                      ->withCount(['paidRegistrations']);
            }])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Get active upcoming programs (limit to 3 for homepage)
        $upcomingPrograms = Program::where('is_active', true)
            ->upcoming()
            ->with(['availableDates' => function($query) {
                $query->where('start_date', '>=', now())
                      ->orderBy('start_date')
                      ->limit(1)
                      ->withCount(['paidRegistrations']);
            }])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Get active banners
        $banners = Banner::active()
            ->ordered()
            ->with('program')
            ->get();

        // Get approved testimonials
        $testimonials = Testimonial::approved()
            ->ordered()
            ->limit(6)
            ->get();

        return view('pages.home', compact('heroVideo', 'videos', 'services', 'programs', 'upcomingPrograms', 'banners', 'testimonials'));
    }
}
