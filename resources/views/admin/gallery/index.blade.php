@extends('admin.layouts.app')

@section('page-title', 'Gallery')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 text-sm">
        <i class="fas fa-plus"></i>
        <span>Add New Item</span>
    </a>
</div>

<div class="rounded-lg overflow-hidden shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    @if($items->isEmpty())
        <div class="text-center py-16">
            <i class="fas fa-images text-6xl text-white/20 mb-4"></i>
            <p class="text-white/70 text-lg mb-4">No gallery items yet</p>
            <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                <i class="fas fa-plus"></i>
                <span>Add First Item</span>
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
            @foreach($items as $item)
                <div class="group relative bg-white/5 rounded-lg overflow-hidden border border-white/10 hover:border-primary/50 transition-all duration-300">
                    <!-- Image/Video Preview -->
                    <div class="aspect-video bg-black/30 relative overflow-hidden {{ $item->type === 'video' ? 'cursor-pointer' : '' }}" 
                         @if($item->type === 'video') onclick="openVideoModal('{{ $item->id }}')" @endif>
                        @if($item->type === 'image')
                            <img src="{{ asset('storage/' . $item->file_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/20 to-accent/20">
                                    <i class="fas fa-play-circle text-6xl text-white/50"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center group-hover:bg-black/30 transition-colors">
                                <div class="bg-black/60 rounded-full p-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-play text-white text-2xl"></i>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Type Badge -->
                        <div class="absolute top-2 left-2">
                            <span class="px-2 py-1 rounded text-xs font-semibold {{ $item->type === 'image' ? 'bg-blue-500' : 'bg-red-500' }} text-white">
                                <i class="fas {{ $item->type === 'image' ? 'fa-image' : 'fa-video' }} mr-1"></i>
                                {{ ucfirst($item->type) }}
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
                            <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this item?');">
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

<!-- Video Modals -->
@foreach($items->where('type', 'video') as $item)
    <div id="videoModal-{{ $item->id }}" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" onclick="closeVideoModal('{{ $item->id }}')">
        <div class="relative max-w-4xl w-full" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button onclick="closeVideoModal('{{ $item->id }}')" class="absolute -top-12 right-0 text-white hover:text-primary transition-colors">
                <i class="fas fa-times text-3xl"></i>
            </button>
            
            <!-- Video Content -->
            <div class="bg-dark-surface rounded-2xl overflow-hidden">
                <div class="aspect-video">
                    <iframe id="videoFrame-{{ $item->id }}" src="" 
                            class="w-full h-full" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                </div>
                
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h2>
                    @if($item->description)
                        <p class="text-white/70">{{ $item->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function openVideoModal(id) {
        const modal = document.getElementById('videoModal-' + id);
        const iframe = document.getElementById('videoFrame-' + id);
        const embedUrl = iframe.getAttribute('data-src') || '{{ $items->where("type", "video")->where("id", "' + id + '")->first()->embed_url ?? "" }}';
        
        // Find the item's embed URL
        @foreach($items->where('type', 'video') as $item)
            if (id === '{{ $item->id }}') {
                iframe.src = '{{ $item->embed_url }}';
            }
        @endforeach
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal(id) {
        const modal = document.getElementById('videoModal-' + id);
        const iframe = document.getElementById('videoFrame-' + id);
        
        // Stop video by clearing src
        iframe.src = '';
        
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="videoModal-"]').forEach(modal => {
                const id = modal.id.replace('videoModal-', '');
                closeVideoModal(id);
            });
        }
    });
</script>
@endsection
