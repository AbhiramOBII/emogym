@extends('layouts.app')

@section('title', $blog->meta_title ?? $blog->title . ' - Emogym')
@section('meta_description', $blog->meta_description ?? $blog->excerpt)

@section('content')
<div class="min-h-screen bg-dark-bg">
    <!-- Hero Section -->
    <section class="relative py-20 px-4">
        @if($blog->image)
            <div class="absolute inset-0 opacity-20">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-dark-bg via-dark-bg/50 to-dark-bg"></div>
            </div>
        @endif
        
        <div class="max-w-4xl mx-auto relative">
            <div class="text-center mb-8">
                <p class="uppercase tracking-[0.3em] text-primary text-sm mb-4">{{ __('navigation.blog') }}</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-dark-text mb-6">
                    {{ $blog->title }}
                </h1>
                
                <div class="flex items-center justify-center gap-6 text-dark-text-secondary">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span>{{ $blog->published_at->format('F d, Y') }}</span>
                    </div>
                    @if($blog->author)
                        <div class="flex items-center gap-2">
                            <i class="fas fa-user text-primary"></i>
                            <span>{{ $blog->author }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($blog->image)
        <section class="px-4 mb-12">
            <div class="max-w-5xl mx-auto">
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-auto">
                </div>
            </div>
        </section>
    @endif

    <!-- Blog Content -->
    <section class="px-4 pb-20">
        <div class="max-w-4xl mx-auto">
            <article class="prose prose-invert prose-lg max-w-none">
                <div class="bg-dark-surface rounded-3xl p-8 md:p-12 border border-white/5 shadow-2xl">
                    <div class="blog-content text-dark-text-secondary leading-relaxed">
                        {!! $blog->content !!}
                    </div>
                </div>
            </article>

            <!-- Share Section -->
            <div class="mt-12 pt-8 border-t border-white/10">
                <h3 class="text-xl font-semibold text-dark-text mb-4">{{ __('blog.share_article') }}</h3>
                <div class="flex gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog->slug)) }}" target="_blank" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10 hover:bg-primary text-white transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}" target="_blank" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10 hover:bg-primary text-white transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $blog->slug)) }}&title={{ urlencode($blog->title) }}" target="_blank" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10 hover:bg-primary text-white transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blog.show', $blog->slug)) }}" target="_blank" class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10 hover:bg-primary text-white transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    @if($relatedBlogs->isNotEmpty())
        <section class="px-4 pb-20">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-dark-text mb-8">{{ __('blog.related_articles') }}</h2>
                
                <div class="grid gap-8 md:grid-cols-3">
                    @foreach($relatedBlogs as $relatedBlog)
                        <article class="group bg-dark-surface rounded-3xl overflow-hidden border border-white/5 shadow-2xl shadow-black/40 hover:-translate-y-2 hover:border-primary/40 transition-all duration-300">
                            @if($relatedBlog->image)
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-primary/20 to-accent/20"></div>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-white/60 mb-3">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $relatedBlog->published_at->format('M d, Y') }}</span>
                                </div>

                                <h3 class="text-xl font-semibold text-dark-text mb-2 group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $relatedBlog->title }}
                                </h3>
                                
                                <p class="text-dark-text-secondary text-sm line-clamp-2 mb-4">
                                    {{ $relatedBlog->excerpt }}
                                </p>

                                <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 font-semibold transition-colors text-sm">
                                    {{ __('blog.read_more') }}
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Back to Blog -->
    <section class="px-4 pb-20">
        <div class="max-w-4xl mx-auto text-center">
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 font-semibold transition-colors">
                <i class="fas fa-arrow-left"></i>
                {{ __('blog.back_to_blog') }}
            </a>
        </div>
    </section>
</div>

<style>
    .blog-content h1, .blog-content h2, .blog-content h3 {
        color: #fff;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .blog-content h1 { font-size: 2.25rem; }
    .blog-content h2 { font-size: 1.875rem; }
    .blog-content h3 { font-size: 1.5rem; }
    .blog-content p {
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }
    .blog-content ul, .blog-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    .blog-content li {
        margin-bottom: 0.5rem;
    }
    .blog-content a {
        color: #FF6B35;
        text-decoration: underline;
    }
    .blog-content a:hover {
        color: #ff8559;
    }
    .blog-content img {
        border-radius: 1rem;
        margin: 2rem 0;
    }
    .blog-content blockquote {
        border-left: 4px solid #FF6B35;
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: rgba(255, 255, 255, 0.8);
    }
    .blog-content strong {
        color: #fff;
        font-weight: 600;
    }
</style>
@endsection
