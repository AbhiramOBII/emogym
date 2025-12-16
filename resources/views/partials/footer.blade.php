<!-- Footer -->
<footer class="bg-charcoal text-white pt-24 pb-8">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Row 1: About Emogym & Newsletter -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-16 lg:gap-20 mb-16">
            <!-- Column 1: About Emogym (6 columns) -->
            <div class="md:col-span-6 space-y-6">
                <h3 class="text-primary text-xl font-bold mb-8">{{ __('footer.about_emogym') }}</h3>
                <div class="flex items-center gap-2 mb-6">
                    <div class="p-2 rounded-xl backdrop-blur-sm">
                        <img src="{{ asset('images/EmoGym-logo.png') }}" alt="Emogym" class="h-24 w-auto">
                    </div>
                    <div class="p-2 rounded-xl backdrop-blur-sm">
                        <img src="{{ asset('images/Bhavanathmaka-2-white.webp') }}" alt="Bhavanathmaka" class="h-24 w-auto">
                    </div>
                </div>
                <p class="text-gray-300 mb-8 leading-relaxed text-base">
                    {{ __('footer.about_description') }}
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-white hover:text-primary transition-colors duration-300 text-xl p-2 hover:bg-white/10 rounded-full"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white hover:text-primary transition-colors duration-300 text-xl p-2 hover:bg-white/10 rounded-full"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-white hover:text-primary transition-colors duration-300 text-xl p-2 hover:bg-white/10 rounded-full"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-primary transition-colors duration-300 text-xl p-2 hover:bg-white/10 rounded-full"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Column 2: Subscribe to Newsletter (6 columns) -->
            <div class="md:col-span-6 space-y-6">
                <h3 class="text-primary text-xl font-bold mb-8">{{ __('footer.subscribe_newsletter') }}</h3>
                <p class="text-gray-300 mb-6 text-base leading-relaxed">{{ __('footer.newsletter_description') }}</p>
                <form class="space-y-4" action="#" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="{{ __('footer.email_placeholder') }}" class="w-full px-5 py-4 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-base" required>
                    <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white px-5 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-xl hover:scale-105 text-base">
                        {{ __('footer.subscribe_now') }}
                    </button>
                </form>
                <p class="text-gray-400 text-sm mt-4 leading-relaxed">{{ __('footer.privacy_notice') }}</p>
            </div>
        </div>

        <!-- Row 2: Quick Links spread across 12 columns -->
        <div class="grid grid-cols-2 md:grid-cols-6 lg:grid-cols-9 gap-8 mb-16">
            <div class="text-center">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.home') }}</a>
            </div>
            <div class="text-center">
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.about') }}</a>
            </div>
            <!-- <div class="text-center">
                <a href="{{ route('services') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.services') }}</a>
            </div> -->
            <div class="text-center">
                <a href="{{ route('programs.index') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.programs') }}</a>
            </div>
            
            <div class="text-center">
                <a href="{{ route('gallery') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.gallery') }}</a>
            </div>
            
            <div class="text-center">
                <a href="{{ route('blog') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.blog') }}</a>
            </div>
            <div class="text-center">
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('navigation.contact') }}</a>
            </div>
            <div class="text-center">
                <a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('footer.terms_of_use') }}</a>
            </div>
            <div class="text-center">
                <a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('footer.disclaimer') }}</a>
            </div>
            <div class="text-center">
                <a href="#" class="text-gray-300 hover:text-primary transition-colors duration-300 text-base font-medium block py-2">{{ __('footer.privacy_policy') }}</a>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="border-t border-gray-600 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex flex-col md:flex-row items-center gap-3 text-center md:text-left">
                    <p class="text-gray-300 text-base">{{ __('footer.powered_by') }} <span class="text-primary font-semibold">Obii Kriationz Web LLP</span></p>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-right">
                    <p class="text-gray-300 text-base">&copy; {{ date('Y') }} Emogym. {{ __('footer.all_rights_reserved') }}</p>
                    <p class="text-gray-400 text-sm">{{ __('footer.copyright_protected') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
