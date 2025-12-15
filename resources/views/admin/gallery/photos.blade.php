@extends('admin.layouts.app')

@section('page-title', 'Photos')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Photos</h1>
    <a href="{{ route('admin.gallery.create', ['type' => 'image']) }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 text-sm">
        <i class="fas fa-plus"></i>
        <span>Add New Photo</span>
    </a>
</div>

<div class="rounded-lg overflow-hidden shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    @if($items->isEmpty())
        <div class="text-center py-16">
            <i class="fas fa-images text-6xl text-white/20 mb-4"></i>
            <p class="text-white/70 text-lg mb-4">No photos yet</p>
            <a href="{{ route('admin.gallery.create', ['type' => 'image']) }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                <i class="fas fa-plus"></i>
                <span>Add First Photo</span>
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
            @foreach($items as $item)
                <div class="group relative bg-white/5 rounded-lg overflow-hidden border border-white/10 hover:border-primary/50 transition-all duration-300">
                    <!-- Image Preview -->
                    <div class="aspect-video bg-black/30 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $item->file_path) }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Type Badge -->
                        <div class="absolute top-2 left-2">
                            <span class="px-2 py-1 rounded text-xs font-semibold bg-blue-500 text-white">
                                <i class="fas fa-image mr-1"></i>
                                Image
                            </span>
                        </div>
                        
                        <!-- Status Badge -->
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 rounded text-xs font-semibold {{ $item->is_active ? 'bg-green-500' : 'bg-gray-500' }} text-white">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="text-white font-semibold mb-1 line-clamp-1">{{ $item->title }}</h3>
                        @if($item->description)
                            <p class="text-white/60 text-sm line-clamp-2 mb-3">{{ $item->description }}</p>
                        @endif
                        
                        <div class="flex items-center justify-between text-xs text-white/50 mb-3">
                            <span><i class="fas fa-sort mr-1"></i>Order: {{ $item->order }}</span>
                            <span>{{ $item->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $item) }}" class="flex-1 bg-white/10 hover:bg-primary text-white px-3 py-2 rounded text-center transition-colors duration-300 text-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white px-3 py-2 rounded transition-colors duration-300 text-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($items->hasPages())
            <div class="p-4 border-t border-white/10">
                {{ $items->links() }}
            </div>
        @endif
    @endif
</div>

@if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in">
        {{ session('success') }}
    </div>
@endif
@endsection
