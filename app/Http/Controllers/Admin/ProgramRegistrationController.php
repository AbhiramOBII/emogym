<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramRegistration;
use Illuminate\Http\Request;

class ProgramRegistrationController extends Controller
{
    public function index()
    {
        $registrations = ProgramRegistration::with(['program', 'programDate'])
            ->latest()
            ->paginate(20);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function updateStatus(Request $request, ProgramRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $registration->update($validated);

        return redirect()->back()->with('success', 'Registration status updated successfully.');
    }

    public function destroy(ProgramRegistration $registration)
    {
        $registration->delete();

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully.');
    }
}
