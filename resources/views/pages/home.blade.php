@extends('layouts.app')

@section('title', 'Home - Emogym')

@section('content')
   <!--Hero Section-->
        <section class="py-20 md:py-32 relative overflow-hidden">
            <!-- Video Background -->
            <div class="absolute inset-0 w-full h-full">
                <iframe 
                    src="https://player.vimeo.com/video/1144774491?autoplay=1&loop=1&muted=1&background=1&controls=0" 
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                    style="width: 120%; height: 120%; min-width: 120%; min-height: 120%;"
                    frameborder="0" 
                    allow="autoplay; fullscreen; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-black/70 z-5"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-12 relative z-10">
                
                <!-- Row 1: Image 1, Title, Subtitle, Image 2 -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12 items-center">
                    
                    <!-- Image 1 -->
                    <div class="space-y-4">
                        <div class="relative group">
                            <div class="aspect-[3/5] rounded-2xl overflow-hidden">
                                <img src="images/tara-3.webp" 
                                     alt="Mental Wellness" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-dark-text">{{__('home.tara')}}</h3>
                        </div>
                    </div>

                    <!-- Title and Subtitle -->
                    <div class="lg:col-span-2 text-center space-y-6">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text leading-tight">
                            {{ __('home.hero_title_1') }} 
                            <span class="text-primary">{{ __('home.hero_title_2') }}</span> 
                            {{ __('home.hero_title_3') }}
                        </h1>
                        <p class="text-lg md:text-xl text-dark-text-secondary leading-relaxed">
                            {{__('home.discover')}}
                        </p>
                    </div>

                    <!-- Image 2 -->
                    <div class="space-y-4">
                        <div class="relative group">
                            <div class="aspect-[3/5] rounded-2xl overflow-hidden">
                                <img src="images/Sandesh-4.webp" 
                                     alt="Therapy Session" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-accent/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-dark-text">{{__('home.sandesh')}}</h3>
                        </div>
                    </div>

                </div>

                <!-- Row 2: Stats with CTA -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 items-center">
                    
                    <!-- Stats -->
                    <div class="lg:col-span-2 grid grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">10+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">{{__('home.years_of_experience')}}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">25,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">{{__('home.lives_touched')}}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">5,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">{{__('home.webinar_participants')}}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">10,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">{{__('home.challenge_completions')}}</div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center lg:justify-start">
                        <button class="bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            {{ __('home.start_journey') }}
                        </button>
                    </div>

                </div>

            </div>
        </section>



  <!-- YouTube Videos Carousel Section -->
        <section class="bg-dark-card py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text mb-4">
                        {{ __('home.watch_transformation') }} <span class="text-primary">{{ __('home.transformation_stories') }}</span> {{ __('home.stories') }}
                    </h2>
                    <p class="text-lg md:text-xl text-dark-text-secondary max-w-3xl mx-auto">
                        {{ __('home.discover_stories') }}
                    </p>
                </div>

                <!-- Video Carousel Container -->
                @if($videos->isEmpty())
                    <div class="text-center py-16">
                        <i class="fas fa-video text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-600 text-lg">{{ __('home.no_videos') }}</p>
                    </div>
                @else
                    @if($videos->count() > 3)
                        <!-- Carousel for more than 3 videos -->
                        <div class="relative">
                            <!-- Carousel Wrapper -->
                            <div class="overflow-hidden rounded-2xl">
                                <div class="flex transition-transform duration-500 ease-in-out" id="videoCarousel">
                                    
                                    @foreach($videos as $video)
                                        <!-- Video {{ $loop->iteration }} -->
                                        <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                                <div class="aspect-video">
                                                    @if($video->youtube_id)
                                                        <iframe 
                                                            class="w-full h-full" 
                                                            src="https://www.youtube.com/embed/{{ $video->youtube_id }}" 
                                                            title="{{ $video->title }}" 
                                                            frameborder="0" 
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                            allowfullscreen>
                                                        </iframe>
                                                    @else
                                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                            <p class="text-gray-500">{{ __('home.invalid_video') }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="p-4">
                                                    <h3 class="text-lg font-semibold text-charcoal mb-2">
                                                        @if(app()->getLocale() == 'kn' && $video->title_kn)
                                                            {{ $video->title_kn }}
                                                        @else
                                                            {{ $video->title }}
                                                        @endif
                                                    </h3>
                                                    @if($video->description || $video->description_kn)
                                                        <p class="text-gray-600 text-sm">
                                                            @if(app()->getLocale() == 'kn' && $video->description_kn)
                                                                {{ Str::limit($video->description_kn, 80) }}
                                                            @else
                                                                {{ Str::limit($video->description, 80) }}
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <!-- Navigation Arrows -->
                            <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110" onclick="previousVideo()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110" onclick="nextVideo()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <!-- Dots Indicator -->
                            <div class="flex justify-center mt-8 space-x-2">
                                <button class="w-3 h-3 rounded-full bg-primary transition-all duration-300" onclick="goToSlide(0)"></button>
                                <button class="w-3 h-3 rounded-full bg-gray-300 hover:bg-primary transition-all duration-300" onclick="goToSlide(1)"></button>
                            </div>
                        </div>
                    @else
                        <!-- Simple grid for 3 or fewer videos -->
                        <div class="grid md:grid-cols-{{ $videos->count() }} gap-6 max-w-5xl mx-auto">
                            @foreach($videos as $video)
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        @if($video->youtube_id)
                                            <iframe 
                                                class="w-full h-full" 
                                                src="https://www.youtube.com/embed/{{ $video->youtube_id }}" 
                                                title="{{ $video->title }}" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                            </iframe>
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <p class="text-gray-500">{{ __('home.invalid_video') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-dark-text mb-2">
                                            @if(app()->getLocale() == 'kn' && $video->title_kn)
                                                {{ $video->title_kn }}
                                            @else
                                                {{ $video->title }}
                                            @endif
                                        </h3>
                                        @if($video->description || $video->description_kn)
                                            <p class="text-gray-600 text-sm">
                                                @if(app()->getLocale() == 'kn' && $video->description_kn)
                                                    {{ Str::limit($video->description_kn, 80) }}
                                                @else
                                                    {{ Str::limit($video->description, 80) }}
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

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

<!-- Upcoming Programs Section -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal mb-4">
                {{ __('home.upcoming_programs') }} <span class="text-primary">{{ __('home.programs') }}</span>
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
                @foreach($programs as $program)
                    @php
                        $upcomingDate = $program->availableDates->first();
                        $remainingSlots = $upcomingDate ? $upcomingDate->remainingSlots() : null;
                    @endphp
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105">
                        @if($program->image)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ asset('storage/' . $program->image) }}" 
                                     alt="{{ $program->title }}" 
                                     class="w-full h-full object-cover">
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
                            @if($remainingSlots === 0)
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
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        <div class="text-center mt-12">
            <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 bg-charcoal hover:bg-charcoal/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-calendar-alt"></i>
                {{ __('home.view_all_programs') }}
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-gray-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal mb-4">
                {{ __('home.what_our') }} <span class="text-primary">{{ __('home.community_says') }}</span> {{ __('home.says') }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('home.real_stories') }}
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_1_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" 
                         alt="{{ __('home.testimonial_1_name') }}" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_1_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_1_role') }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_2_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Rajesh Kumar" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_2_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_2_role') }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_3_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Anita Desai" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_3_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_3_role') }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_4_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Meera Patel" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_4_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_4_role') }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_5_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Vikram Singh" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_5_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_5_role') }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-700 mb-6 italic">
                    {{ __('home.testimonial_6_quote') }}
                </blockquote>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" 
                         alt="Sunita Reddy" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-semibold text-charcoal">{{ __('home.testimonial_6_name') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('home.testimonial_6_role') }}</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Stats Section -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">4.9/5</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.average_rating') }}</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">2,500+</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.happy_participants') }}</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">98%</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.completion_rate') }}</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">95%</div>
                <div class="text-sm md:text-base text-gray-600">{{ __('home.would_recommend') }}</div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-12">
            <a href="#" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-heart text-xl"></i>
                {{ __('home.share_your_story') }}
            </a>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    // Video Carousel JavaScript
    let currentSlide = 0;
    const totalSlides = 2; // We have 6 videos, showing 3 at a time = 2 slides
    const carousel = document.getElementById('videoCarousel');
    const dots = document.querySelectorAll('[onclick^="goToSlide"]');

    function updateCarousel() {
        const translateX = -currentSlide * 100;
        carousel.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-primary');
            } else {
                dot.classList.remove('bg-primary');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    function nextVideo() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function previousVideo() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(slideIndex) {
        currentSlide = slideIndex;
        updateCarousel();
    }

    // Auto-play carousel (optional)
    setInterval(nextVideo, 8000); // Change slide every 8 seconds

    // Touch/Swipe support for mobile
    let startX = 0;
    let endX = 0;

    carousel.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });

    carousel.addEventListener('touchend', function(e) {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextVideo(); // Swipe left - next slide
            } else {
                previousVideo(); // Swipe right - previous slide
            }
        }
    }

    // Pause auto-play on hover
    const carouselContainer = document.querySelector('.relative');
    let autoPlayInterval;

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextVideo, 8000);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    carouselContainer.addEventListener('mouseenter', stopAutoPlay);
    carouselContainer.addEventListener('mouseleave', startAutoPlay);

    // Initialize
    startAutoPlay();
</script>
@endpush

@include('partials.registration-modal')
