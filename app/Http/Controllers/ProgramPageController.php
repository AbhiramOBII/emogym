<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Contracts\View\View;

class ProgramPageController extends Controller
{
    public function __invoke(): View
    {
        $programs = Program::query()
            ->with(['availableDates' => function($query) {
                $query->orderBy('start_date')
                      ->withCount(['paidRegistrations']);
            }])
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('pages.programs', compact('programs'));
    }

    public function show(Program $program): View
    {
        $program->load(['availableDates' => function($query) {
            $query->where('is_available', true)
                  ->orderBy('start_date')
                  ->withCount(['paidRegistrations']);
        }]);

        return view('pages.program-detail', compact('program'));
    }
}
