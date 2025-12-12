<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramDate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_programs' => Program::count(),
            'active_programs' => Program::where('is_active', true)->count(),
            'upcoming_dates' => ProgramDate::where('start_date', '>=', now())->count(),
            'total_participants' => ProgramDate::sum('current_participants'),
        ];

        $recentPrograms = Program::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPrograms'));
    }
}
