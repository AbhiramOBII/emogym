<!-- Top Bar -->
<div class="text-white py-2 px-4 text-sm relative overflow-hidden z-40" style="background-color: #1a1a1a;">
    <div class="max-w-7xl mx-auto px-2 relative">
        <div class="grid grid-cols-2 md:flex md:justify-between md:items-center gap-4 items-center">
            <!-- Contact Info -->
            <div class="flex items-center justify-start">
                <div class="group flex items-center gap-3 hover:bg-white/10 rounded-lg px-3 py-2 transition-all duration-300">
                    <div class="relative">
                        <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                            <i class="fas fa-phone text-primary text-sm group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs text-white/70 uppercase tracking-wide">{{ __('navigation.call_us') }}</span>
                        <a href="tel:+919964331200" class="text-white hover:text-primary transition-colors duration-300 font-medium text-sm group-hover:translate-x-1 transition-transform duration-300">+91-9964 33 12 00</a>
                    </div>
                </div>
            </div>

            <!-- Language Selection -->
            <div class="flex items-center gap-2 justify-end">
                <span class="text-xs text-white/70 uppercase tracking-wide mr-2 hidden sm:block">{{ __('navigation.language') }}</span>
                <div class="flex gap-2">
                    <button 
                        data-lang="en" 
                        class="group relative w-10 h-10 {{ app()->getLocale() == 'en' ? 'bg-primary' : 'bg-white/20 hover:bg-primary' }} rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95" 
                        title="English">
                        <span class="text-white group-hover:text-white transition-colors duration-300 text-sm font-bold">EN</span>
                        <div class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-primary/50 transition-colors duration-300"></div>
                    </button>
                    <button 
                        data-lang="kn" 
                        class="group relative w-10 h-10 {{ app()->getLocale() == 'kn' ? 'bg-primary' : 'bg-white/20 hover:bg-primary' }} rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95" 
                        title="ಕನ್ನಡ">
                        <span class="text-white group-hover:text-white transition-colors duration-300 text-sm font-bold">ಕ</span>
                        <div class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-primary/50 transition-colors duration-300"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="shadow-lg sticky top-0 py-2 md:py-2 relative z-50" style="background: #262626; background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    <div class="max-w-7xl mx-auto px-3 md:px-5">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/EmoGym-logo.png') }}" alt="Emogym" class="h-20 sm:h-24 md:h-32 w-auto">
            </div>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden md:flex items-center">
                <ul class="flex list-none gap-9 m-0">
                    <li><a href="{{ route('home') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.home') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                    <li><a href="{{ route('about') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.about') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                    <li><a href="{{ route('services') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.services') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                    <li><a href="{{ route('programs') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.programs') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                    <li><a href="{{ route('blog') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.blog') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                    <li><a href="{{ route('contact') }}" class="text-dark-text no-underline font-semibold hover:text-primary transition-colors duration-300 relative group" style="font-size: 17px;">{{ __('navigation.contact') }}<span class="absolute w-0 h-0.5 bottom-[-5px] left-0 bg-primary transition-all duration-300 group-hover:w-full"></span></a></li>
                </ul>
            </nav>

            <!-- Mobile Navigation Menu -->
            <nav class="mobile-nav fixed inset-0 bg-black/50 backdrop-blur-sm z-50 opacity-0 invisible transition-all duration-300">
                <div class="absolute right-0 top-0 h-full w-80 max-w-[80vw] bg-dark-card shadow-2xl transform translate-x-full transition-transform duration-300 overflow-y-auto">
                    <!-- Close button for mobile menu -->
                    <div class="absolute top-6 right-6 cursor-pointer mobile-menu-close">
                        <i class="fas fa-times text-2xl text-dark-text hover:text-primary transition-colors duration-300"></i>
                    </div>
                    
                    <div class="p-8 pt-16">
                        <ul class="flex flex-col list-none gap-6 m-0 p-0">
                            <li><a href="{{ route('home') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.home') }}</a></li>
                            <li><a href="{{ route('about') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.about') }}</a></li>
                            <li><a href="{{ route('services') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.services') }}</a></li>
                            <li><a href="{{ route('programs') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.programs') }}</a></li>
                            <li><a href="{{ route('blog') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.blog') }}</a></li>
                            <li><a href="{{ route('contact') }}" class="text-dark-text no-underline font-medium text-lg hover:text-primary transition-colors duration-300 block py-2">{{ __('navigation.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Right side container with Second Logo and Mobile Menu -->
            <div class="flex items-center gap-2 sm:gap-4">
                <!-- Second Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/Bhavanathmaka-2-white.webp') }}" alt="Bhavanathmaka" class="h-20 sm:h-24 md:h-32 w-auto">
                </div>
                
                <!-- Mobile Menu Toggle -->
                <div class="md:hidden flex flex-col cursor-pointer gap-1 mobile-menu-toggle">
                    <span class="w-6 h-0.5 bg-dark-text transition-all duration-300"></span>
                    <span class="w-6 h-0.5 bg-dark-text transition-all duration-300"></span>
                    <span class="w-6 h-0.5 bg-dark-text transition-all duration-300"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
.mobile-nav.active {
    opacity: 1;
    visibility: visible;
}

.mobile-nav.active > div {
    transform: translateX(0);
}

.mobile-menu-toggle span:nth-child(1).active {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-menu-toggle span:nth-child(2).active {
    opacity: 0;
}

.mobile-menu-toggle span:nth-child(3).active {
    transform: rotate(-45deg) translate(7px, -6px);
}
</style>
