@extends('admin.layouts.app')

@section('page-title', 'Services')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Services</h1>
    <a href="{{ route('admin.services.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 text-sm">
        <i class="fas fa-plus"></i>
        <span>Add New Service</span>
    </a>
</div>

<div class="rounded-lg overflow-hidden shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    @if($services->isEmpty())
        <div class="text-center py-16">
            <i class="fas fa-concierge-bell text-6xl text-white/20 mb-4"></i>
            <p class="text-white/70 text-lg mb-4">No services yet</p>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                <i class="fas fa-plus"></i>
                <span>Add First Service</span>
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left py-4 px-4 text-white/70 font-medium text-sm">Thumbnail</th>
                        <th class="text-left py-4 px-4 text-white/70 font-medium text-sm">Title</th>
                        <th class="text-left py-4 px-4 text-white/70 font-medium text-sm">Description</th>
                        <th class="text-center py-4 px-4 text-white/70 font-medium text-sm">Order</th>
                        <th class="text-center py-4 px-4 text-white/70 font-medium text-sm">Status</th>
                        <th class="text-right py-4 px-4 text-white/70 font-medium text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors duration-200">
                            <!-- Thumbnail -->
                            <td class="py-4 px-4">
                                @if($service->thumbnail)
                                    <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->title }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-white/30 text-xl"></i>
                                    </div>
                                @endif
                            </td>
                            
                            <!-- Title -->
                            <td class="py-4 px-4">
                                <div class="text-white font-medium">{{ $service->title }}</div>
                                @if($service->title_kn)
                                    <div class="text-white/50 text-sm mt-1">{{ $service->title_kn }}</div>
                                @endif
                            </td>
                            
                            <!-- Description -->
                            <td class="py-4 px-4">
                                <div class="text-white/70 text-sm line-clamp-2 max-w-md">
                                    {{ $service->description }}
                                </div>
                            </td>
                            
                            <!-- Order -->
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-white/10 rounded-full text-white text-sm font-medium">
                                    {{ $service->order }}
                                </span>
                            </td>
                            
                            <!-- Status -->
                            <td class="py-4 px-4 text-center">
                                @if($service->is_active)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-500/20 text-green-500 rounded-full text-xs font-medium">
                                        <i class="fas fa-check-circle"></i>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-gray-500/20 text-gray-400 rounded-full text-xs font-medium">
                                        <i class="fas fa-times-circle"></i>
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Actions -->
                            <td class="py-4 px-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.services.edit', $service) }}" 
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-500/20 hover:bg-blue-500/30 text-blue-400 rounded-lg transition-colors duration-200 text-sm">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-lg transition-colors duration-200 text-sm">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
            <div class="px-4 py-4 border-t border-white/10">
                {{ $services->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
