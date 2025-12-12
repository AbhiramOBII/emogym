@extends('layouts.app')

@section('title', 'Blog - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="uppercase tracking-[0.3em] text-primary text-sm mb-4">{{ __('navigation.blog') }}</p>
                <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-6">
                    {{ __('blog.title') }}
                </h1>
                <p class="text-xl text-dark-text-secondary max-w-3xl mx-auto">
                    {{ __('blog.description') }}
                </p>
            </div>

            @if ($blogs->isNotEmpty())
                <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($blogs as $blog)
                        <article class="group bg-dark-surface rounded-3xl overflow-hidden border border-white/5 shadow-2xl shadow-black/40 hover:-translate-y-2 hover:border-primary/40 transition-all duration-300">
                            @if ($blog->image)
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            @else
                                <div class="h-56 bg-gradient-to-br from-primary/20 to-accent/20"></div>
                            @endif

                            <div class="p-7 flex flex-col gap-4">
                                <div class="flex items-center gap-3 text-sm text-white/60">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $blog->published_at->format('M d, Y') }}</span>
                                    @if($blog->author)
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-user"></i>
                                        <span>{{ $blog->author }}</span>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="text-2xl font-semibold text-dark-text mb-3 group-hover:text-primary transition-colors">
                                        {{ $blog->title }}
                                    </h3>
                                    <p class="text-dark-text-secondary leading-relaxed line-clamp-3">
                                        {{ $blog->excerpt }}
                                    </p>
                                </div>

                                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 font-semibold transition-colors mt-2">
                                    {{ __('blog.read_more') }}
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($blogs->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $blogs->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <i class="fas fa-blog text-6xl text-white/20 mb-4"></i>
                    <p class="text-xl text-dark-text-secondary">{{ __('blog.no_articles') }}</p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
