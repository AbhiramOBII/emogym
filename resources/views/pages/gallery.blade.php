@extends('layouts.app')

@section('title', 'Gallery - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="uppercase tracking-[0.3em] text-primary text-sm mb-4">{{ __('navigation.gallery') }}</p>
                <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-6">
                    {{ __('gallery.title') }}
                </h1>
                <p class="text-xl text-dark-text-secondary max-w-3xl mx-auto">
                    {{ __('gallery.description') }}
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center gap-4 mb-12">
                <a href="{{ route('gallery', ['type' => 'all']) }}" 
                   class="px-6 py-3 rounded-lg transition-all duration-300 {{ $type === 'all' ? 'bg-primary text-white' : 'bg-dark-surface text-white/70 hover:bg-white/10' }}">
                    <i class="fas fa-th mr-2"></i>{{ __('gallery.all') }}
                </a>
                <a href="{{ route('gallery', ['type' => 'image']) }}" 
                   class="px-6 py-3 rounded-lg transition-all duration-300 {{ $type === 'image' ? 'bg-primary text-white' : 'bg-dark-surface text-white/70 hover:bg-white/10' }}">
                    <i class="fas fa-image mr-2"></i>{{ __('gallery.images') }}
                </a>
                <a href="{{ route('gallery', ['type' => 'video']) }}" 
                   class="px-6 py-3 rounded-lg transition-all duration-300 {{ $type === 'video' ? 'bg-primary text-white' : 'bg-dark-surface text-white/70 hover:bg-white/10' }}">
                    <i class="fas fa-video mr-2"></i>{{ __('gallery.videos') }}
                </a>
            </div>

            @if ($items->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($items as $item)
                        <div class="group bg-dark-surface rounded-2xl overflow-hidden border border-white/5 shadow-2xl shadow-black/40 hover:-translate-y-2 hover:border-primary/40 transition-all duration-300 cursor-pointer"
                             onclick="openModal('{{ $item->id }}')">
                            <!-- Image/Video Preview -->
                            <div class="aspect-video bg-black/30 relative overflow-hidden">
                                @if($item->type === 'image')
                                    <img src="{{ asset('storage/' . $item->file_path) }}" 
                                         alt="{{ $item->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    @if($item->thumbnail)
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                                             alt="{{ $item->title }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/20 to-accent/20">
                                            <i class="fas fa-play-circle text-6xl text-white/50"></i>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/50 transition-colors">
                                        <div class="bg-primary rounded-full p-4 group-hover:scale-110 transition-transform">
                                            <i class="fas fa-play text-white text-2xl"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4">
                                <h3 class="text-white font-semibold mb-1 line-clamp-1 group-hover:text-primary transition-colors">
                                    {{ $item->title }}
                                </h3>
                                @if($item->description)
                                    <p class="text-dark-text-secondary text-sm line-clamp-2">
                                        {{ $item->description }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Modal for each item -->
                        <div id="modal-{{ $item->id }}" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" onclick="closeModal('{{ $item->id }}')">
                            <div class="relative max-w-6xl w-full" onclick="event.stopPropagation()">
                                <!-- Close Button -->
                                <button onclick="closeModal('{{ $item->id }}')" class="absolute -top-12 right-0 text-white hover:text-primary transition-colors">
                                    <i class="fas fa-times text-3xl"></i>
                                </button>
                                
                                <!-- Content -->
                                <div class="bg-dark-surface rounded-2xl overflow-hidden">
                                    @if($item->type === 'image')
                                        <img src="{{ asset('storage/' . $item->file_path) }}" 
                                             alt="{{ $item->title }}" 
                                             class="w-full h-auto max-h-[80vh] object-contain">
                                    @else
                                        <div class="aspect-video">
                                            <iframe src="{{ $item->embed_url }}" 
                                                    class="w-full h-full" 
                                                    frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen></iframe>
                                        </div>
                                    @endif
                                    
                                    <div class="p-6">
                                        <h2 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h2>
                                        @if($item->description)
                                            <p class="text-dark-text-secondary">{{ $item->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($items->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $items->appends(['type' => $type])->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <i class="fas fa-images text-6xl text-white/20 mb-4"></i>
                    <p class="text-xl text-dark-text-secondary">No {{ $type !== 'all' ? $type : '' }} items available yet. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>
</div>

<script>
    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        const modal = document.getElementById('modal-' + id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="modal-"]').forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.body.style.overflow = 'auto';
        }
    });
</script>
@endsection
