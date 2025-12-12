@extends('admin.layouts.app')

@section('page-title', 'Program Dates')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.programs.index') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2 mb-4">
        <i class="fas fa-arrow-left"></i>
        <span>Back to Programs</span>
    </a>
    
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-white">{{ $program->title }}</h2>
            <p class="text-white/70 mt-1">Manage program dates and schedules</p>
        </div>
        <a href="{{ route('admin.programs.dates.create', $program) }}" class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg">
            <i class="fas fa-plus"></i>
            <span>Add New Date</span>
        </a>
    </div>
</div>

<div class="rounded-lg shadow-lg overflow-hidden" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    @if($dates->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Start Date</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">End Date</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Time</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Participants</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Status</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dates as $date)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors duration-200">
                            <td class="py-4 px-6 text-white">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar text-primary"></i>
                                    {{ $date->start_date->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="py-4 px-6 text-white">
                                {{ $date->end_date ? $date->end_date->format('M d, Y') : '-' }}
                            </td>
                            <td class="py-4 px-6 text-white">
                                @if($date->start_time)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-clock text-blue-400"></i>
                                        {{ date('g:i A', strtotime($date->start_time)) }}
                                        @if($date->end_time)
                                            - {{ date('g:i A', strtotime($date->end_time)) }}
                                        @endif
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($date->max_participants)
                                    <div class="text-white">
                                        <span class="font-semibold">{{ $date->current_participants }}</span> / {{ $date->max_participants }}
                                        <div class="w-full bg-white/10 rounded-full h-2 mt-1">
                                            <div class="bg-primary h-2 rounded-full" style="width: {{ $date->max_participants > 0 ? ($date->current_participants / $date->max_participants * 100) : 0 }}%"></div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-white/70">Unlimited</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $date->is_available ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                    {{ $date->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.programs.dates.edit', [$program, $date]) }}" class="text-primary hover:text-primary/80 transition-colors duration-200" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.programs.dates.destroy', [$program, $date]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this date?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors duration-200" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-white/10">
            {{ $dates->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-calendar-times text-white/20 text-6xl mb-4"></i>
            <p class="text-white/70 text-lg mb-6">No dates scheduled for this program yet.</p>
            <a href="{{ route('admin.programs.dates.create', $program) }}" class="inline-block bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                <i class="fas fa-plus mr-2"></i>
                Add First Date
            </a>
        </div>
    @endif
</div>
@endsection
