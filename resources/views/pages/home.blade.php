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
                            <h3 class="text-xl font-bold text-dark-text">Tara</h3>
                        </div>
                    </div>

                    <!-- Title and Subtitle -->
                    <div class="lg:col-span-2 text-center space-y-6">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text leading-tight">
                            Transform Your 
                            <span class="text-primary">Mental Health</span> 
                            Journey
                        </h1>
                        <p class="text-lg md:text-xl text-dark-text-secondary leading-relaxed">
                            Discover personalized emotional wellness programs designed to help you thrive in every aspect of life with expert guidance and compassionate care.
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
                            <h3 class="text-xl font-bold text-dark-text">Sandesh</h3>
                        </div>
                    </div>

                </div>

                <!-- Row 2: Stats with CTA -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 items-center">
                    
                    <!-- Stats -->
                    <div class="lg:col-span-2 grid grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">10+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">Years of Experience in Life-Education & Transformation</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">25,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">Lives Touched Through Workshops & Courses</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">5,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">"Naanu Yaake Heeghe" Webinar Participants</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl lg:text-4xl font-extrabold text-primary mb-2">10,000+</div>
                            <div class="text-sm lg:text-base font-medium text-dark-text-secondary">"30-Day Transformation Challenge" Completions</div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center lg:justify-start">
                        <button class="bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            Start Your Journey
                        </button>
                    </div>

                </div>

            </div>
        </section>



  <!-- YouTube Videos Carousel Section -->
        <section class="bg-gray-100 py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Watch Our <span class="text-primary">Transformation</span> Stories
                    </h2>
                    <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                        Discover real stories of change and growth through our video content
                    </p>
                </div>

                <!-- Video Carousel Container -->
                <div class="relative">
                    <!-- Carousel Wrapper -->
                    <div class="overflow-hidden rounded-2xl">
                        <div class="flex transition-transform duration-500 ease-in-out" id="videoCarousel">
                            
                            <!-- Video 1 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/ZidGozDhOjg" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Transformation Journey</h3>
                                        <p class="text-gray-600 text-sm">Watch how our program helped transform lives</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Video 2 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/inpok4MKVLM" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mental Wellness Tips</h3>
                                        <p class="text-gray-600 text-sm">Learn practical techniques for daily wellness</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Video 3 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/92i5m3tV5XY" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Success Stories</h3>
                                        <p class="text-gray-600 text-sm">Hear from our community members</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Video 4 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/ZToicYcHIOU" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mindfulness Practice</h3>
                                        <p class="text-gray-600 text-sm">Daily mindfulness exercises for better mental health</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Video 5 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/h-rGgpPbR5w" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Emotional Intelligence</h3>
                                        <p class="text-gray-600 text-sm">Building emotional awareness and regulation skills</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Video 6 -->
                            <div class="w-full md:w-1/3 flex-shrink-0 px-2">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                    <div class="aspect-video">
                                        <iframe 
                                            class="w-full h-full" 
                                            src="https://www.youtube.com/embed/3nwwKbM_vJc" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Community Support</h3>
                                        <p class="text-gray-600 text-sm">How our community helps in healing and growth</p>
                                    </div>
                                </div>
                            </div>

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

                <!-- View All Videos Button -->
                <div class="text-center mt-12">
                    <a href="#" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        View All Videos
                    </a>
                </div>

            </div>
        </section>

<!-- Services Preview Section -->
<section class="py-20 px-4 bg-dark-bg">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-dark-text mb-6">Our Services</h2>
            <p class="text-xl text-dark-text-secondary max-w-3xl mx-auto">
                Comprehensive mental health services tailored to your individual needs and goals.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-dark-surface p-6 rounded-xl border border-gray-700 hover:border-primary/50 transition-all duration-300">
                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-comments text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-dark-text mb-3">Individual Therapy</h3>
                <p class="text-dark-text-secondary text-sm">One-on-one counseling sessions tailored to your specific needs.</p>
            </div>
            
            <div class="bg-dark-surface p-6 rounded-xl border border-gray-700 hover:border-accent/50 transition-all duration-300">
                <div class="w-12 h-12 bg-accent/20 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-users text-accent text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-dark-text mb-3">Group Sessions</h3>
                <p class="text-dark-text-secondary text-sm">Supportive group therapy with peers facing similar challenges.</p>
            </div>
            
            <div class="bg-dark-surface p-6 rounded-xl border border-gray-700 hover:border-gold/50 transition-all duration-300">
                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-gold text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-dark-text mb-3">Mindfulness</h3>
                <p class="text-dark-text-secondary text-sm">Meditation and mindfulness practices for stress reduction.</p>
            </div>
            
            <div class="bg-dark-surface p-6 rounded-xl border border-gray-700 hover:border-primary/50 transition-all duration-300">
                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-brain text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-dark-text mb-3">Wellness Programs</h3>
                <p class="text-dark-text-secondary text-sm">Comprehensive programs for holistic mental wellness.</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-primary to-accent text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                View All Services
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<!-- Call to Action Section -->
<section class="py-20 px-4 bg-gradient-to-r from-primary/10 to-accent/10">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-dark-text mb-6">Ready to Begin Your Journey?</h2>
        <p class="text-xl text-dark-text-secondary mb-10 leading-relaxed">
            Take the first step towards better emotional wellness. Our team is here to support you every step of the way.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="bg-primary hover:bg-primary/90 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                Schedule Consultation
            </a>
            <a href="tel:+919964331200" class="border-2 border-primary text-primary hover:bg-primary hover:text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-2xl flex items-center gap-3 justify-center">
                <i class="fas fa-phone"></i>
                Call Now: +91-9964 33 12 00
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
