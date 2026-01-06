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
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">2-Day Exp</th>
                        <th class="text-left py-4 px-6 text-white/70 font-semibold">Show on Home</th>
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
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           class="sr-only peer two-day-toggle" 
                                           data-program-id="{{ $program->id }}"
                                           {{ $program->is_two_day_experience ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-white/10 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                </label>
                            </td>
                            <td class="py-4 px-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           class="sr-only peer show-on-home-toggle" 
                                           data-program-id="{{ $program->id }}"
                                           {{ $program->show_on_home ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-white/10 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                </label>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const twoDayToggles = document.querySelectorAll('.two-day-toggle');
    const homeToggles = document.querySelectorAll('.show-on-home-toggle');
    
    twoDayToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const programId = this.dataset.programId;
            const isChecked = this.checked;
            
            twoDayToggles.forEach(t => t.disabled = true);
            
            fetch(`/admin/programs/${programId}/toggle-two-day-experience`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    is_two_day_experience: isChecked
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (isChecked) {
                        twoDayToggles.forEach(t => {
                            if (t !== toggle) {
                                t.checked = false;
                            }
                        });
                    }
                    showNotification('2-Day Experience updated successfully!', 'success');
                } else {
                    toggle.checked = !isChecked;
                    showNotification(data.message || 'Failed to update', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toggle.checked = !isChecked;
                showNotification('An error occurred', 'error');
            })
            .finally(() => {
                twoDayToggles.forEach(t => t.disabled = false);
            });
        });
    });
    
    homeToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const programId = this.dataset.programId;
            const isChecked = this.checked;
            
            homeToggles.forEach(t => t.disabled = true);
            
            fetch(`/admin/programs/${programId}/toggle-show-on-home`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    show_on_home: isChecked
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const checkedCount = Array.from(homeToggles).filter(t => t.checked).length;
                    if (isChecked && checkedCount > 5) {
                        toggle.checked = false;
                        showNotification(data.message || 'Maximum 5 programs can be shown on home page', 'error');
                    } else {
                        showNotification('Home page visibility updated successfully!', 'success');
                    }
                } else {
                    toggle.checked = !isChecked;
                    showNotification(data.message || 'Failed to update', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toggle.checked = !isChecked;
                showNotification('An error occurred', 'error');
            })
            .finally(() => {
                homeToggles.forEach(t => t.disabled = false);
            });
        });
    });
    
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white z-50 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
});
</script>
@endpush
@endsection
