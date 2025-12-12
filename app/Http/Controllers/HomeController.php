<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
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

        // Get active programs with upcoming dates (limit to 6 for preview)
        $programs = Program::where('is_active', true)
            ->with(['availableDates' => function($query) {
                $query->where('start_date', '>=', now())
                      ->orderBy('start_date')
                      ->limit(1)
                      ->withCount(['paidRegistrations']);
            }])
            ->limit(6)
            ->get();

        return view('pages.home', compact('videos', 'services', 'programs'));
    }
}
