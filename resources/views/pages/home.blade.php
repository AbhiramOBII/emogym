@extends('layouts.app')

@section('title', 'Home - Emogym')

@section('content')
   <!--Hero Section-->
        <section class="lg:py-20 lg:py-6 particles-bg">
            
            <!-- Mobile: Title Section with Video Background -->
            <div class="lg:hidden relative overflow-hidden py-12">
                @if($heroVideo && $heroVideo->video_url)
                <div class="absolute inset-0 w-full h-full">
                    @php
                        $videoUrl = $heroVideo->video_url;
                        // Add autoplay parameters for Vimeo
                        if (strpos($videoUrl, 'vimeo.com') !== false) {
                            preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
                            $vimeoId = $matches[1] ?? null;
                            if ($vimeoId) {
                                $videoUrl = "https://player.vimeo.com/video/{$vimeoId}?autoplay=1&loop=1&muted=1&background=1&controls=0";
                            }
                        }
                        // Add autoplay parameters for YouTube
                        elseif (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                            $youtubeId = $heroVideo->youtube_id;
                            if ($youtubeId) {
                                $videoUrl = "https://www.youtube.com/embed/{$youtubeId}?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&modestbranding=1&playlist={$youtubeId}";
                            }
                        }
                    @endphp
                    <iframe 
                        src="{{ $videoUrl }}" 
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                        style="width: 120%; height: 120%; min-width: 120%; min-height: 120%;"
                        frameborder="0" 
                        allow="autoplay; fullscreen; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                @endif
                
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-black/70 z-5"></div>

                <!-- Title and Subtitle -->
                <div class="max-w-7xl mx-auto px-6 relative z-10 text-center space-y-4">
                    <h1 class="text-2xl md:text-3xl font-bold text-dark-text leading-tight animate-slide-up">
                        {{ __('home.hero_title_1') }} 
                        <span class="text-primary animate-glow-text">{{ __('home.hero_title_2') }}</span> 
                        {{ __('home.hero_title_3') }}
                    </h1>
                    <p class="text-base md:text-lg text-dark-text-secondary leading-relaxed animate-slide-up delay-300">
                        {{__('home.discover')}}
                    </p>
                </div>
            </div>

            <!-- Mobile: Images Section (No Video Background) -->
            <div class="lg:hidden bg-dark-bg py-8">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-2 gap-4 items-start">
                        <!-- Image 1 -->
                        <div class="space-y-2 animate-slide-left delay-400">
                            <div class="relative group hover-lift shine-effect animate-float-slow">
                                <div class="aspect-[3/5] rounded-2xl overflow-hidden shadow-2xl">
                                    <img src="images/tara-3.webp" 
                                         alt="Mental Wellness" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-primary/30 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="text-center animate-fade-in delay-600">
                                <h3 class="text-sm font-bold text-dark-text">{{__('home.tara')}}</h3>
                            </div>
                        </div>

                        <!-- Image 2 -->
                        <div class="space-y-2 animate-slide-right delay-500">
                            <div class="relative group hover-lift shine-effect animate-float-reverse">
                                <div class="aspect-[3/5] rounded-2xl overflow-hidden shadow-2xl">
                                    <img src="images/Sandesh-4.webp" 
                                         alt="Therapy Session" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-accent/30 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="text-center animate-fade-in delay-700">
                                <h3 class="text-sm font-bold text-dark-text">{{__('home.sandesh')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Stats Section -->
            <div class="lg:hidden bg-dark-bg py-8">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="text-center animate-scale-in delay-600">
                            <div class="text-3xl font-extrabold text-primary mb-2 counter-animate" data-target="10">10+</div>
                            <div class="text-sm font-medium text-dark-text-secondary">{{__('home.years_of_experience')}}</div>
                        </div>
                        <div class="text-center animate-scale-in delay-700">
                            <div class="text-3xl font-extrabold text-primary mb-2 counter-animate" data-target="25000">25,000+</div>
                            <div class="text-sm font-medium text-dark-text-secondary">{{__('home.lives_touched')}}</div>
                        </div>
                        <div class="text-center animate-scale-in delay-800">
                            <div class="text-3xl font-extrabold text-primary mb-2 counter-animate" data-target="5000">5,000+</div>
                            <div class="text-sm font-medium text-dark-text-secondary">{{__('home.webinar_participants')}}</div>
                        </div>
                        <div class="text-center animate-scale-in delay-900">
                            <div class="text-3xl font-extrabold text-primary mb-2 counter-animate" data-target="10000">10,000+</div>
                            <div class="text-sm font-medium text-dark-text-secondary">{{__('home.challenge_completions')}}</div>
                        </div>
                    </div>
                    <div class="flex justify-center animate-slide-up delay-1000">
                        <button class="bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl animate-pulse-glow">
                            <a href="{{ route('programs.index') }}">{{ __('home.start_journey') }}</a>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Desktop: Full Layout with Video Background -->
            <div class="hidden lg:block relative overflow-hidden py-6 md:py-12">
                @if($heroVideo && $heroVideo->video_url)
                <div class="absolute inset-0 w-full h-full">
                    @php
                        $videoUrl = $heroVideo->video_url;
                        if (strpos($videoUrl, 'vimeo.com') !== false) {
                            preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
                            $vimeoId = $matches[1] ?? null;
                            if ($vimeoId) {
                                $videoUrl = "https://player.vimeo.com/video/{$vimeoId}?autoplay=1&loop=1&muted=1&background=1&controls=0";
                            }
                        }
                        elseif (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                            $youtubeId = $heroVideo->youtube_id;
                            if ($youtubeId) {
                                $videoUrl = "https://www.youtube.com/embed/{$youtubeId}?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&modestbranding=1&playlist={$youtubeId}";
                            }
                        }
                    @endphp
                    <iframe 
                        src="{{ $videoUrl }}" 
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                        style="width: 120%; height: 120%; min-width: 120%; min-height: 120%;"
                        frameborder="0" 
                        allow="autoplay; fullscreen; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                @endif
                
                <div class="absolute inset-0 bg-black/70 z-5"></div>

                <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-12 relative z-10">
                    <div class="grid grid-cols-4 gap-12 items-center">
                        <!-- Image 1 -->
                        <div class="space-y-4 animate-slide-left delay-300">
                            <div class="relative group hover-lift shine-effect animate-float-slow">
                                <div class="aspect-[3/5] rounded-2xl overflow-hidden shadow-2xl">
                                    <img src="images/tara-3.webp" 
                                         alt="Mental Wellness" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-primary/30 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="text-center animate-fade-in delay-500">
                                <h3 class="text-xl font-bold text-dark-text">{{__('home.tara')}}</h3>
                            </div>
                        </div>

                        <!-- Title and Subtitle -->
                        <div class="col-span-2 text-center space-y-6">
                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text leading-tight animate-slide-up">
                                {{ __('home.hero_title_1') }} 
                                <span class="text-primary animate-glow-text">{{ __('home.hero_title_2') }}</span> 
                                {{ __('home.hero_title_3') }}
                            </h1>
                            <p class="text-lg md:text-xl text-dark-text-secondary leading-relaxed animate-slide-up delay-200">
                                {{__('home.discover')}}
                            </p>
                        </div>

                        <!-- Image 2 -->
                        <div class="space-y-4 animate-slide-right delay-300">
                            <div class="relative group hover-lift shine-effect animate-float-reverse">
                                <div class="aspect-[3/5] rounded-2xl overflow-hidden shadow-2xl">
                                    <img src="images/Sandesh-4.webp" 
                                         alt="Therapy Session" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-accent/30 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="text-center animate-fade-in delay-500">
                                <h3 class="text-xl font-bold text-dark-text">{{__('home.sandesh')}}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Stats with CTA -->
                    <div class="grid grid-cols-3 gap-12 items-center">
                        <div class="col-span-2 grid grid-cols-4 gap-6">
                            <div class="text-center animate-scale-in delay-500">
                                <div class="text-4xl font-extrabold text-primary mb-2 counter-animate" data-target="10">10+</div>
                                <div class="text-base font-medium text-dark-text-secondary">{{__('home.years_of_experience')}}</div>
                            </div>
                            <div class="text-center animate-scale-in delay-600">
                                <div class="text-4xl font-extrabold text-primary mb-2 counter-animate" data-target="25000">25,000+</div>
                                <div class="text-base font-medium text-dark-text-secondary">{{__('home.lives_touched')}}</div>
                            </div>
                            <div class="text-center animate-scale-in delay-700">
                                <div class="text-4xl font-extrabold text-primary mb-2 counter-animate" data-target="5000">5,000+</div>
                                <div class="text-base font-medium text-dark-text-secondary">{{__('home.webinar_participants')}}</div>
                            </div>
                            <div class="text-center animate-scale-in delay-800">
                                <div class="text-4xl font-extrabold text-primary mb-2 counter-animate" data-target="10000">10,000+</div>
                                <div class="text-base font-medium text-dark-text-secondary">{{__('home.challenge_completions')}}</div>
                            </div>
                        </div>
                        <div class="flex justify-start animate-slide-up delay-900">
                            <button class="bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl animate-pulse-glow">
                                <a href="{{ route('programs.index') }}"> {{ __('home.start_journey') }}</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner Section -->
        @if($banners->isNotEmpty())
        <section class="bg-dark-bg">
            @if($banners->count() > 1)
                <!-- Banner Carousel -->
                <div class="relative">
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-700 ease-out" id="bannerCarousel">
                            @foreach($banners as $banner)
                                <div class="flex-shrink-0 w-full">
                                    <div class="relative aspect-[21/9] md:aspect-[3/1] overflow-hidden group">
                                            <!-- Banner Image -->
                                            <img src="{{ asset('storage/' . $banner->image) }}" 
                                                 alt="{{ $banner->title }}"
                                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                            
                                            <!-- Gradient Overlay -->
                                            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
                                            
                                            <!-- Content -->
                                            <div class="absolute inset-0 flex items-center">
                                                <div class="max-w-2xl px-8 md:px-12 lg:px-16">
                                                    <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">
                                                        @if(app()->getLocale() == 'kn' && $banner->title_kn)
                                                            {{ $banner->title_kn }}
                                                        @else
                                                            {{ $banner->title }}
                                                        @endif
                                                    </h2>
                                                    @if($banner->description || $banner->description_kn)
                                                        <p class="text-base md:text-lg text-white/80 mb-6 line-clamp-3">
                                                            @if(app()->getLocale() == 'kn' && $banner->description_kn)
                                                                {{ $banner->description_kn }}
                                                            @else
                                                                {{ $banner->description }}
                                                            @endif
                                                        </p>
                                                    @endif
                                                    <a href="{{ $banner->button_link }}" 
                                                       class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-semibold text-base md:text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                                        @if(app()->getLocale() == 'kn' && $banner->button_text_kn)
                                                            {{ $banner->button_text_kn }}
                                                        @else
                                                            {{ $banner->button_text }}
                                                        @endif
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button id="prevBannerBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="nextBannerBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Dots Indicator -->
                    <div class="flex justify-center mt-6 mb-6 gap-2" id="bannerDots">
                        @foreach($banners as $index => $banner)
                            <button class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-primary w-8' : 'bg-white/30 hover:bg-white/50' }}" 
                                    onclick="goToBannerSlide({{ $index }})"></button>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Single Banner -->
                @php $banner = $banners->first(); @endphp
                <div class="relative aspect-[21/9] md:aspect-[3/1] overflow-hidden group">
                        <!-- Banner Image -->
                        <img src="{{ asset('storage/' . $banner->image) }}" 
                             alt="{{ $banner->title }}"
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
                        
                    <!-- Content -->
                    <div class="absolute inset-0 flex items-center">
                        <div class="max-w-2xl px-8 md:px-12 lg:px-16">
                            <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">
                                @if(app()->getLocale() == 'kn' && $banner->title_kn)
                                    {{ $banner->title_kn }}
                                @else
                                    {{ $banner->title }}
                                @endif
                            </h2>
                            @if($banner->description || $banner->description_kn)
                                <p class="text-base md:text-lg text-white/80 mb-6 line-clamp-3">
                                    @if(app()->getLocale() == 'kn' && $banner->description_kn)
                                        {{ $banner->description_kn }}
                                    @else
                                        {{ $banner->description }}
                                    @endif
                                </p>
                            @endif
                            <a href="{{ $banner->button_link }}" 
                               class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-semibold text-base md:text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                @if(app()->getLocale() == 'kn' && $banner->button_text_kn)
                                    {{ $banner->button_text_kn }}
                                @else
                                    {{ $banner->button_text }}
                                @endif
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        @endif

  <!-- YouTube Videos Carousel Section -->
        <section class="bg-dark-card py-6 md:py-12" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
            <!-- Section Header -->
            <div class="text-center mb-12 px-6 lg:px-8" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text mb-4">
                    {{ __('home.watch_transformation') }} <span class="text-primary animate-text-shimmer">{{ __('home.transformation_stories') }}</span> {{ __('home.stories') }}
                </h2>
                <p class="text-lg md:text-xl text-dark-text-secondary max-w-3xl mx-auto">
                    {{ __('home.discover_stories') }}
                </p>
            </div>

            <!-- Video Cards Container -->
            @if($videos->isEmpty())
                <div class="text-center py-16">
                    <i class="fas fa-video text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-600 text-lg">{{ __('home.no_videos') }}</p>
                </div>
            @else
                <div class="relative" data-aos="fade-up" data-aos-delay="200">
                    <!-- Carousel Wrapper -->
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-out" id="videoCarousel">
                            @foreach($videos as $video)
                                <!-- Video Card -->
                                <div class="flex-shrink-0 w-1/2 md:w-1/3 lg:w-1/5 px-2">
                                        <div class="video-card-wrapper group cursor-pointer hover-lift" 
                                             data-video-id="{{ $video->youtube_id }}"
                                             data-video-title="@if(app()->getLocale() == 'kn' && $video->title_kn){{ $video->title_kn }}@else{{ $video->title }}@endif"
                                             data-video-description="@if(app()->getLocale() == 'kn' && $video->description_kn){{ $video->description_kn }}@else{{ $video->description }}@endif"
                                             onclick="openVideoModal(this)">
                                            <div class="relative rounded-xl overflow-hidden shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:scale-105">
                                                <!-- Video Thumbnail with Hover Play -->
                                                <div class="aspect-[9/16] relative bg-gradient-to-br from-gray-800 to-gray-900">
                                                    <!-- Thumbnail Image -->
                                                    <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" 
                                                         alt="{{ $video->title }}"
                                                         class="absolute inset-0 w-full h-full object-cover video-thumbnail">
                                                    
                                                    <!-- Video iframe (hidden by default, shown on hover) -->
                                                    <iframe 
                                                        class="absolute inset-0 w-full h-full video-iframe opacity-0 pointer-events-none"
                                                        data-src="https://www.youtube.com/embed/{{ $video->youtube_id }}?autoplay=1&mute=1&controls=0&loop=1&playlist={{ $video->youtube_id }}"
                                                        frameborder="0"
                                                        allow="autoplay; encrypted-media">
                                                    </iframe>
                                                    
                                                    <!-- Play Button Overlay -->
                                                    <div class="absolute inset-0 flex items-center justify-center bg-black/30 transition-opacity duration-300 group-hover:opacity-0">
                                                        <div class="bg-white/90 backdrop-blur-sm rounded-full p-4 shadow-lg">
                                                            <svg class="w-8 h-8 text-gray-900 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M8 5v14l11-7z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Watch Button -->
                                                    <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-full flex items-center gap-2">
                                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M8 5v14l11-7z"/>
                                                        </svg>
                                                        <span class="text-white text-sm font-semibold">Watch</span>
                                                    </div>
                                                </div>
                                                
                                                <!-- Video Info Overlay -->
                                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent p-6 text-white">
                                                    <h3 class="text-2xl font-bold mb-2 line-clamp-2">
                                                        @if(app()->getLocale() == 'kn' && $video->title_kn)
                                                            {{ $video->title_kn }}
                                                        @else
                                                            {{ $video->title }}
                                                        @endif
                                                    </h3>
                                                    @if($video->description || $video->description_kn)
                                                        <p class="text-sm text-gray-200 line-clamp-2">
                                                            @if(app()->getLocale() == 'kn' && $video->description_kn)
                                                                {{ $video->description_kn }}
                                                            @else
                                                                {{ $video->description }}
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Navigation Arrows -->
                        <div class="flex items-center justify-center gap-4 mt-8">
                            <button id="prevVideoBtn" class="bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="nextVideoBtn" class="bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- View All Videos Button -->
                    <div class="text-center mt-12">
                        <a href="{{ route('gallery') }}?type=video" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            {{ __('home.view_all_videos') }}
                        </a>
                    </div>
                @endif

            </div>
        </section>

        <!-- Video Modal -->
        <div id="videoModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
            <div class="relative w-full max-w-6xl">
                <!-- Close Button -->
                <button onclick="closeVideoModal()" class="absolute -top-12 right-0 text-white hover:text-primary transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <!-- Video Container -->
                <div class="bg-black rounded-2xl overflow-hidden shadow-2xl">
                    <div class="aspect-video">
                        <iframe id="modalVideoFrame" 
                                class="w-full h-full" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    
                    <!-- Video Info -->
                    <div class="p-6 bg-gray-900">
                        <h3 id="modalVideoTitle" class="text-2xl font-bold text-white mb-2"></h3>
                        <p id="modalVideoDescription" class="text-gray-300"></p>
                    </div>
                </div>
            </div>
        </div>

<!-- Upcoming Programs Section -->
<section class="py-6  px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal mb-4"> 
                <span class="text-primary animate-text-shimmer">{{ __('home.programs') }}</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('home.join_transformative') }}
            </p>
        </div>
        
        @if($programs->isEmpty())
            <div class="text-center py-16">
                <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-600 text-lg">{{ __('home.no_programs') }}</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $index => $program)
                    @php
                        $upcomingDate = $program->availableDates->first();
                        $remainingSlots = $upcomingDate ? $upcomingDate->remainingSlots() : null;
                    @endphp
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover-lift" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        @if($program->image)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ asset('storage/' . $program->image) }}" 
                                     alt="{{ $program->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-charcoal mb-3">
                                @if(app()->getLocale() == 'kn' && $program->title_kn)
                                    {{ $program->title_kn }}
                                @else
                                    {{ $program->title }}
                                @endif
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                @if(app()->getLocale() == 'kn' && $program->short_description_kn)
                                    {{ $program->short_description_kn }}
                                @else
                                    {{ $program->short_description }}
                                @endif
                            </p>
                            
                            <!-- Pricing -->
                            @if($program->original_price > 0 || $program->cost > 0)
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-2xl font-bold text-primary">₹{{ number_format($program->cost, 0) }}</span>
                                    @if($program->original_price && $program->original_price > $program->cost)
                                        <span class="text-lg text-gray-500 line-through">₹{{ number_format($program->original_price, 0) }}</span>
                                        @if($program->discount_percentage)
                                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">{{ number_format($program->discount_percentage, 0) }}% {{ __('home.off') }}</span>
                                        @endif
                                    @endif
                                </div>
                            @endif
                            
                            @if($upcomingDate)
                                <!-- Program Details -->
                                <div class="flex items-center justify-between mb-4">
                                    @if($remainingSlots === null)
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-users text-primary"></i>
                                            <span class="text-sm text-gray-600">{{ __('home.unlimited_seats') }}</span>
                                        </div>
                                    @elseif($remainingSlots > 0)
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-users text-primary"></i>
                                            <span class="text-sm text-gray-600">{{ $remainingSlots }} {{ $remainingSlots === 1 ? __('home.seat_left') : __('home.seats_left') }}</span>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-users text-red-500"></i>
                                            <span class="text-sm text-red-600 font-semibold">{{ __('home.fully_booked') }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-calendar text-primary"></i>
                                        <span class="text-sm text-gray-600">
                                            {{ $upcomingDate->start_date->format('M d, Y') }}
                                            @if($upcomingDate->end_date && !$upcomingDate->start_date->isSameDay($upcomingDate->end_date))
                                                - {{ $upcomingDate->end_date->format('M d, Y') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- CTA Button -->
                            <!-- @if($remainingSlots === 0)
                                <button disabled class="w-full bg-gray-400 cursor-not-allowed text-white py-3 rounded-full font-semibold">
                                    <i class="fas fa-times-circle"></i> {{ __('home.fully_booked') }}
                                </button>
                            @else
                                <button onclick="openRegistrationModal(
                                    {{ $program->id }}, 
                                    '{{ addslashes($program->title) }}', 
                                    '₹{{ number_format($program->cost, 0) }}', 
                                    '{{ $upcomingDate ? $upcomingDate->start_date->format('M d, Y') : 'TBD' }}',
                                    {{ $upcomingDate ? $upcomingDate->id : 'null' }},
                                    {{ $program->original_price ? "'₹" . number_format($program->original_price, 0) . "'" : 'null' }},
                                    {{ $program->discount_percentage ? $program->discount_percentage : 'null' }}
                                )" class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg">
                                    {{ __('home.register_now') }}
                                </button>
                            @endif -->
                            <a href="{{ route('programs.show', $program->slug) }}" class="w-full inline-block bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold text-center transition-all duration-300 hover:shadow-lg">
                                {{ __('home.view_details') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 bg-charcoal hover:bg-charcoal/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-calendar-alt"></i>
                {{ __('home.view_all_programs') }}
            </a>
        </div>
    </div>
</section>

<!-- Upcoming Programs Section -->
@if($upcomingPrograms->isNotEmpty())
<section class="py-6 md:py-12" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                {{ __('home.upcoming') }} <span class="text-primary animate-text-shimmer">{{ __('home.programs') }}</span>
            </h2>
            <p class="text-lg md:text-xl text-white/70 max-w-3xl mx-auto">
                {{ __('home.upcoming_description') }}
            </p>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($upcomingPrograms as $index => $program)
                @php
                    $upcomingDate = $program->availableDates->first();
                    $remainingSlots = $upcomingDate ? $upcomingDate->remainingSlots() : null;
                @endphp
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover-lift" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    @if($program->image)
                        <div class="aspect-video overflow-hidden relative">
                            <img src="{{ asset('storage/' . $program->image) }}" 
                                 alt="{{ $program->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                            <div class="absolute top-4 left-4">
                                <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full animate-pulse">
                                    {{ __('home.coming_soon') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-charcoal mb-3">
                            @if(app()->getLocale() == 'kn' && $program->title_kn)
                                {{ $program->title_kn }}
                            @else
                                {{ $program->title }}
                            @endif
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            @if(app()->getLocale() == 'kn' && $program->short_description_kn)
                                {{ $program->short_description_kn }}
                            @else
                                {{ $program->short_description }}
                            @endif
                        </p>
                        
                        <!-- Pricing -->
                        @if($program->original_price > 0 || $program->cost > 0)
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl font-bold text-primary">₹{{ number_format($program->cost, 0) }}</span>
                                @if($program->original_price && $program->original_price > $program->cost)
                                    <span class="text-lg text-gray-500 line-through">₹{{ number_format($program->original_price, 0) }}</span>
                                    @if($program->discount_percentage)
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">{{ number_format($program->discount_percentage, 0) }}% {{ __('home.off') }}</span>
                                    @endif
                                @endif
                            </div>
                        @endif
                        
                        @if($upcomingDate)
                            <div class="flex items-center justify-between mb-4">
                                @if($remainingSlots === null)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-users text-primary"></i>
                                        <span class="text-sm text-gray-600">{{ __('home.unlimited_seats') }}</span>
                                    </div>
                                @elseif($remainingSlots > 0)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-users text-primary"></i>
                                        <span class="text-sm text-gray-600">{{ $remainingSlots }} {{ $remainingSlots === 1 ? __('home.seat_left') : __('home.seats_left') }}</span>
                                    </div>
                                @else
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-users text-red-500"></i>
                                        <span class="text-sm text-red-600 font-semibold">{{ __('home.fully_booked') }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar text-primary"></i>
                                    <span class="text-sm text-gray-600">{{ $upcomingDate->start_date->format('M d, Y') }}</span>
                                </div>
                            </div>
                        @endif
                        
                        <!-- CTA Button -->
                        <a href="{{ route('programs.show', $program->slug) }}" class="w-full inline-block bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold text-center transition-all duration-300 hover:shadow-lg">
                            {{ __('home.view_details') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('programs.upcoming') }}" class="inline-flex items-center gap-2 bg-white hover:bg-white/90 text-charcoal px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-rocket animate-bounce"></i>
                {{ __('home.view_all_upcoming') }}
            </a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
@if($testimonials->count() > 0)
<section class="bg-gray-50 py-6 md:py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal mb-4">
                {{ __('home.what_our') }} <span class="text-primary animate-text-shimmer">{{ __('home.community_says') }}</span> {{ __('home.says') }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('home.real_stories') }}
            </p>
        </div>

        <!-- Testimonials Grid - Dynamic from Database -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testimonial)
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <blockquote class="text-gray-700 mb-6 italic">
                        "{{ $testimonial->story }}"
                    </blockquote>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center mr-4">
                            <span class="text-primary font-bold text-lg">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-charcoal">{{ $testimonial->name }}</h4>
                            @if($testimonial->occupation)
                                <p class="text-sm text-gray-600">{{ $testimonial->occupation }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Stats Section -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="fade-up">
            <div data-aos="zoom-in" data-aos-delay="100">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">4.9/5</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.average_rating') }}</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">2,500+</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.happy_participants') }}</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">98%</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.completion_rate') }}</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="400">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">95%</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.would_recommend') }}</div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Share Your Story CTA Section -->
<section class="py-6 bg-white" data-aos="fade-up">
    <div class="text-center">
        <button onclick="openTestimonialModal()" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl animate-pulse-glow">
            <i class="fas fa-heart text-xl"></i>
            {{ __('home.share_your_story') }}
        </button>
    </div>
</section>

<!-- Testimonial Submission Modal -->
<div id="testimonialModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity bg-black/70" onclick="closeTestimonialModal()"></div>
        
        <!-- Modal content -->
        <div class="relative z-10 w-full max-w-lg p-6 mx-auto bg-white rounded-2xl shadow-2xl transform transition-all">
            <!-- Close button -->
            <button onclick="closeTestimonialModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
            
            <!-- Modal header -->
            <div class="mb-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
                    <i class="fas fa-heart text-primary text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-charcoal">{{ __('home.share_your_story') }}</h3>
                <p class="text-gray-600 mt-2">{{ __('home.testimonial_subtitle') }}</p>
            </div>
            
            <!-- Form -->
            <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4 text-left">
                @csrf
                
                <!-- Name -->
                <div>
                    <label for="testimonial_name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('home.your_name') }} <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="testimonial_name" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="{{ __('home.enter_your_name') }}">
                </div>
                
                <!-- Occupation -->
                <div>
                    <label for="testimonial_occupation" class="block text-sm font-medium text-gray-700 mb-1">{{ __('home.occupation') }}</label>
                    <input type="text" name="occupation" id="testimonial_occupation"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="{{ __('home.enter_occupation') }}">
                </div>
                
                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('home.your_rating') }} <span class="text-red-500">*</span></label>
                    <div class="flex gap-2" id="starRating">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" onclick="setRating({{ $i }})" class="star-btn text-3xl text-gray-300 hover:text-yellow-400 transition-colors" data-rating="{{ $i }}">
                                <i class="fas fa-star"></i>
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="testimonial_rating" value="5" required>
                </div>
                
                <!-- Story -->
                <div>
                    <label for="testimonial_story" class="block text-sm font-medium text-gray-700 mb-1">{{ __('home.your_story') }} <span class="text-red-500">*</span></label>
                    <textarea name="story" id="testimonial_story" rows="4" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                        placeholder="{{ __('home.share_experience') }}" maxlength="2000"></textarea>
                    <p class="text-xs text-gray-500 mt-1">{{ __('home.max_characters') }}</p>
                </div>
                
                <!-- Submit -->
                <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg">
                    {{ __('home.submit_story') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Video Card Hover-to-Play Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const videoCards = document.querySelectorAll('.video-card-wrapper');
        
        videoCards.forEach(card => {
            const iframe = card.querySelector('.video-iframe');
            const thumbnail = card.querySelector('.video-thumbnail');
            let hoverTimeout;
            
            card.addEventListener('mouseenter', function() {
                hoverTimeout = setTimeout(() => {
                    const dataSrc = iframe.getAttribute('data-src');
                    if (dataSrc && !iframe.getAttribute('src')) {
                        iframe.setAttribute('src', dataSrc);
                    }
                    iframe.classList.remove('opacity-0', 'pointer-events-none');
                    iframe.classList.add('opacity-100');
                    thumbnail.classList.add('opacity-0');
                }, 300);
            });
            
            card.addEventListener('mouseleave', function() {
                clearTimeout(hoverTimeout);
                iframe.classList.remove('opacity-100');
                iframe.classList.add('opacity-0', 'pointer-events-none');
                thumbnail.classList.remove('opacity-0');
                
                setTimeout(() => {
                    if (iframe.getAttribute('src')) {
                        iframe.setAttribute('src', '');
                    }
                }, 300);
            });
        });

        // Video Carousel Functionality
        const carousel = document.getElementById('videoCarousel');
        const prevBtn = document.getElementById('prevVideoBtn');
        const nextBtn = document.getElementById('nextVideoBtn');
        
        if (carousel && prevBtn && nextBtn) {
            let currentPosition = 0;
            let cardWidth = 0;
            let visibleCards = 0;
            let totalCards = carousel.children.length;
            
            function updateCardWidth() {
                if (carousel.children.length > 0) {
                    cardWidth = carousel.children[0].offsetWidth;
                    const containerWidth = carousel.parentElement.offsetWidth;
                    visibleCards = Math.floor(containerWidth / cardWidth);
                }
            }
            
            function updateButtonVisibility() {
                prevBtn.style.display = currentPosition <= 0 ? 'none' : 'block';
                nextBtn.style.display = currentPosition >= totalCards - visibleCards ? 'none' : 'block';
            }
            
            function scrollCarousel(direction) {
                updateCardWidth();
                
                if (direction === 'next') {
                    currentPosition = Math.min(currentPosition + 1, totalCards - visibleCards);
                } else {
                    currentPosition = Math.max(currentPosition - 1, 0);
                }
                
                const translateX = -(currentPosition * cardWidth);
                carousel.style.transform = `translateX(${translateX}px)`;
                updateButtonVisibility();
            }
            
            prevBtn.addEventListener('click', () => scrollCarousel('prev'));
            nextBtn.addEventListener('click', () => scrollCarousel('next'));
            
            // Touch/Swipe Support
            let touchStartX = 0;
            let touchEndX = 0;
            
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });
            
            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        scrollCarousel('next');
                    } else {
                        scrollCarousel('prev');
                    }
                }
            }
            
            // Initialize and handle resize
            updateCardWidth();
            updateButtonVisibility();
            
            window.addEventListener('resize', () => {
                updateCardWidth();
                const translateX = -(currentPosition * cardWidth);
                carousel.style.transform = `translateX(${translateX}px)`;
                updateButtonVisibility();
            });
        }
    });
    
    // Video Modal Functions
    function openVideoModal(element) {
        const videoId = element.getAttribute('data-video-id');
        const videoTitle = element.getAttribute('data-video-title');
        const videoDescription = element.getAttribute('data-video-description');
        
        const modal = document.getElementById('videoModal');
        const modalFrame = document.getElementById('modalVideoFrame');
        const modalTitle = document.getElementById('modalVideoTitle');
        const modalDescription = document.getElementById('modalVideoDescription');
        
        modalFrame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        modalTitle.textContent = videoTitle;
        modalDescription.textContent = videoDescription;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const modalFrame = document.getElementById('modalVideoFrame');
        
        modalFrame.src = '';
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    });
    
    document.getElementById('videoModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });

    // Banner Carousel Functionality
    (function() {
        const bannerCarousel = document.getElementById('bannerCarousel');
        const prevBannerBtn = document.getElementById('prevBannerBtn');
        const nextBannerBtn = document.getElementById('nextBannerBtn');
        const bannerDots = document.getElementById('bannerDots');
        
        if (bannerCarousel && prevBannerBtn && nextBannerBtn) {
            let currentBannerSlide = 0;
            const totalBanners = bannerCarousel.children.length;
            let bannerAutoPlayInterval;
            
            function updateBannerCarousel() {
                const translateX = -(currentBannerSlide * 100);
                bannerCarousel.style.transform = `translateX(${translateX}%)`;
                
                // Update dots
                if (bannerDots) {
                    const dots = bannerDots.querySelectorAll('button');
                    dots.forEach((dot, index) => {
                        if (index === currentBannerSlide) {
                            dot.classList.remove('bg-white/30', 'w-3');
                            dot.classList.add('bg-primary', 'w-8');
                        } else {
                            dot.classList.remove('bg-primary', 'w-8');
                            dot.classList.add('bg-white/30', 'w-3');
                        }
                    });
                }
            }
            
            function nextBannerSlide() {
                currentBannerSlide = (currentBannerSlide + 1) % totalBanners;
                updateBannerCarousel();
            }
            
            function prevBannerSlide() {
                currentBannerSlide = (currentBannerSlide - 1 + totalBanners) % totalBanners;
                updateBannerCarousel();
            }
            
            window.goToBannerSlide = function(index) {
                currentBannerSlide = index;
                updateBannerCarousel();
                resetBannerAutoPlay();
            };
            
            prevBannerBtn.addEventListener('click', () => {
                prevBannerSlide();
                resetBannerAutoPlay();
            });
            
            nextBannerBtn.addEventListener('click', () => {
                nextBannerSlide();
                resetBannerAutoPlay();
            });
            
            // Auto-play
            function startBannerAutoPlay() {
                bannerAutoPlayInterval = setInterval(nextBannerSlide, 5000);
            }
            
            function stopBannerAutoPlay() {
                clearInterval(bannerAutoPlayInterval);
            }
            
            function resetBannerAutoPlay() {
                stopBannerAutoPlay();
                startBannerAutoPlay();
            }
            
            // Pause on hover
            bannerCarousel.parentElement.addEventListener('mouseenter', stopBannerAutoPlay);
            bannerCarousel.parentElement.addEventListener('mouseleave', startBannerAutoPlay);
            
            // Touch/Swipe support
            let bannerTouchStartX = 0;
            let bannerTouchEndX = 0;
            
            bannerCarousel.addEventListener('touchstart', (e) => {
                bannerTouchStartX = e.changedTouches[0].screenX;
            });
            
            bannerCarousel.addEventListener('touchend', (e) => {
                bannerTouchEndX = e.changedTouches[0].screenX;
                const diff = bannerTouchStartX - bannerTouchEndX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        nextBannerSlide();
                    } else {
                        prevBannerSlide();
                    }
                    resetBannerAutoPlay();
                }
            });
            
            // Initialize
            startBannerAutoPlay();
        }
    })();

    // Testimonial Modal Functions
    function openTestimonialModal() {
        const modal = document.getElementById('testimonialModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        // Set default rating to 5 stars
        setRating(5);
    }
    
    function closeTestimonialModal() {
        const modal = document.getElementById('testimonialModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    function setRating(rating) {
        document.getElementById('testimonial_rating').value = rating;
        const starBtns = document.querySelectorAll('.star-btn');
        starBtns.forEach((btn, index) => {
            if (index < rating) {
                btn.classList.remove('text-gray-300');
                btn.classList.add('text-yellow-400');
            } else {
                btn.classList.remove('text-yellow-400');
                btn.classList.add('text-gray-300');
            }
        });
    }
    
    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeTestimonialModal();
        }
    });

    // Counter Animation for Stats
    function animateCounters() {
        const counters = document.querySelectorAll('.counter-animate');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    if (target >= 1000) {
                        counter.textContent = Math.floor(current).toLocaleString() + '+';
                    } else {
                        counter.textContent = Math.floor(current) + '+';
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    if (target >= 1000) {
                        counter.textContent = target.toLocaleString() + '+';
                    } else {
                        counter.textContent = target + '+';
                    }
                }
            };
            
            // Start animation when element is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
    }
    
    // Initialize counter animation after page load
    window.addEventListener('load', function() {
        setTimeout(animateCounters, 500);
    });

    // Parallax effect for hero images on scroll
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroImages = document.querySelectorAll('.animate-float-slow, .animate-float-reverse');
        
        heroImages.forEach((img, index) => {
            const speed = index % 2 === 0 ? 0.03 : -0.03;
            img.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
</script>
@endpush

@include('partials.registration-modal')
