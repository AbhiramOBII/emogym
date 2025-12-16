@extends('admin.layouts.app')

@section('page-title', 'Programs')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-white">All Programs</h2>
    <a href="{{ route('admin.programs.create') }}" class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg">
        <i class="fas fa-plus"></i>
        <span>Add New Program</span>
    </a>
</div>

<div class="rounded-lg shadow-lg overflow-hidden" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    @if($programs->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Image</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Title</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Type</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Cost</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Status</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Schedule</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors duration-200">
                            <td class="py-4 px-6">
                                @if($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-white/30"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="text-white font-semibold">{{ $program->title }}</p>
                                    <p class="text-white/50 text-sm">{{ Str::limit($program->short_description, 50) }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $program->type === 'online' ? 'bg-blue-500/20 text-blue-400' : 'bg-green-500/20 text-green-400' }}">
                                    <i class="fas {{ $program->type === 'online' ? 'fa-wifi' : 'fa-map-marker-alt' }} mr-1"></i>
                                    {{ ucfirst($program->type) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-white font-semibold">₹{{ number_format($program->cost, 2) }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $program->is_active ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                    {{ $program->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.programs.dates.index', $program) }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200" title="Manage Dates">
                                        <i class="fas fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.programs.edit', $program) }}" class="text-primary hover:text-primary/80 transition-colors duration-200" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this program?');">
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
            {{ $programs->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-calendar-alt text-white/20 text-6xl mb-4"></i>
            <p class="text-white/70 text-lg mb-6">No programs found. Create your first program!</p>
            <a href="{{ route('admin.programs.create') }}" class="inline-block bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                <i class="fas fa-plus mr-2"></i>
                Create Program
            </a>
        </div>
    @endif
</div>
@endsection
