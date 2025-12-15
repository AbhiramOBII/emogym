<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramDate;
use Illuminate\Http\Request;

class ProgramDateController extends Controller
{
    public function index(Program $program)
    {
        $dates = $program->dates()->latest()->paginate(10);
        return view('admin.program-dates.index', compact('program', 'dates'));
    }

    public function create(Program $program)
    {
        return view('admin.program-dates.create', compact('program'));
    }

    public function store(Request $request, Program $program)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'max_participants' => 'nullable|integer|min:1',
            'current_participants' => 'nullable|integer|min:0',
            'is_available' => 'boolean',
            'notes' => 'nullable|string',
            'notes_kn' => 'nullable|string',
        ]);

        $validated['is_available'] = $request->has('is_available');
        $program->dates()->create($validated);

        return redirect()->route('admin.programs.dates.index', $program)
            ->with('success', 'Program date created successfully.');
    }

    public function edit(Program $program, ProgramDate $date)
    {
        return view('admin.program-dates.edit', compact('program', 'date'));
    }

    public function update(Request $request, Program $program, ProgramDate $date)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'max_participants' => 'nullable|integer|min:1',
            'current_participants' => 'nullable|integer|min:0',
            'is_available' => 'boolean',
            'notes' => 'nullable|string',
            'notes_kn' => 'nullable|string',
        ]);

        $validated['is_available'] = $request->has('is_available');
        $date->update($validated);

        return redirect()->route('admin.programs.dates.index', $program)
            ->with('success', 'Program date updated successfully.');
    }

    public function destroy(Program $program, ProgramDate $date)
    {
        $date->delete();

        return redirect()->route('admin.programs.dates.index', $program)
            ->with('success', 'Program date deleted successfully.');
    }
}
