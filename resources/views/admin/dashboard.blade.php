@extends('admin.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white/70 text-sm">{{ __('admin-dashboard.total_programs') }}</p>
                <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_programs'] }}</p>
            </div>
            <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                <i class="fas fa-calendar-alt text-primary text-xl"></i>
            </div>
        </div>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white/70 text-sm">Active Programs</p>
                <p class="text-3xl font-bold text-white mt-2">{{ $stats['active_programs'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-green-500 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white/70 text-sm">Upcoming Dates</p>
                <p class="text-3xl font-bold text-white mt-2">{{ $stats['upcoming_dates'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-blue-500 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white/70 text-sm">Total Participants</p>
                <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_participants'] }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-500/20 rounded-full flex items-center justify-center">
                <i class="fas fa-users text-purple-500 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Programs -->
<div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Recent Programs</h2>
        <a href="{{ route('admin.programs.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2">
            <i class="fas fa-plus"></i>
            <span>Add New Program</span>
        </a>
    </div>

    @if($recentPrograms->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left py-3 px-4 text-white/70 font-semibold">Title</th>
                        <th class="text-left py-3 px-4 text-white/70 font-semibold">Type</th>
                        <th class="text-left py-3 px-4 text-white/70 font-semibold">Cost</th>
                        <th class="text-left py-3 px-4 text-white/70 font-semibold">Status</th>
                        <th class="text-left py-3 px-4 text-white/70 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentPrograms as $program)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors duration-200">
                            <td class="py-3 px-4 text-white">{{ app()->getLocale() === 'kn' ? $program->title_kn : $program->title }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $program->type === 'online' ? 'bg-blue-500/20 text-blue-400' : 'bg-green-500/20 text-green-400' }}">
                                    {{ ucfirst($program->type) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-white">₹{{ number_format($program->cost, 2) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $program->is_active ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                    {{ $program->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.programs.edit', $program) }}" class="text-primary hover:text-primary/80 transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-calendar-alt text-white/20 text-6xl mb-4"></i>
            <p class="text-white/70">No programs yet. Create your first program!</p>
            <a href="{{ route('admin.programs.create') }}" class="inline-block mt-4 bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                Create Program
            </a>
        </div>
    @endif
</div>
@endsection
