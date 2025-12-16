<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emogym - Emotional Wellness')</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('images/EmoGym-logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/EmoGym-logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/EmoGym-logo.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Baloo+Tamma+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <!-- Font Awesome - Load before Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- AOS - Animate On Scroll Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#FF4F73',
                        'accent': '#8A6EFA',
                        'gold': '#edc368',
                        'charcoal': '#282828',
                        'lightpink': '#fbdbe2',
                        'dark-bg': '#0f0f0f',
                        'dark-surface': '#1a1a1a',
                        'dark-card': '#262626',
                        'dark-text': '#e5e5e5',
                        'dark-text-secondary': '#a3a3a3',
                    },
                    fontFamily: {
                        'sans': ['DM Sans', 'sans-serif'],
                        'kannada': ['Baloo Tamma 2', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Language-specific font styles -->
    <style>
        /* Apply Kannada font when language is Kannada */
        html[lang="kn"] body,
        html[lang="kn"] *:not(.fa):not(.fas):not(.far):not(.fal):not(.fab):not(.fa-brands):not(.fa-solid):not(.fa-regular):not(.fa-light):not([class*="fa-"]) {
            font-family: 'Baloo Tamma 2', sans-serif !important;
        }
        
        /* Keep English font for English language */
        html[lang="en"] body,
        html[lang="en"] *:not(.fa):not(.fas):not(.far):not(.fal):not(.fab):not(.fa-brands):not(.fa-solid):not(.fa-regular):not(.fa-light):not([class*="fa-"]) {
            font-family: 'DM Sans', sans-serif !important;
        }
        
        /* Ensure Font Awesome icons use their own font */
        .fa, .fas, .far, .fal, .fab, .fa-brands, .fa-solid, .fa-regular, .fa-light, [class*="fa-"] {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands", "Font Awesome 6 Pro" !important;
        }
        
        /* Utility classes for manual font switching */
        .font-kannada {
            font-family: 'Baloo Tamma 2', sans-serif !important;
        }
        
        .font-english {
            font-family: 'DM Sans', sans-serif !important;
        }
        
        /* CKEditor Content Styling - Lists */
        .prose ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        
        .prose ol li,
        .prose ul li {
            margin: 0.5rem 0;
            padding-left: 0.5rem;
        }
        
        .prose ol ol {
            list-style-type: lower-alpha;
        }
        
        .prose ul ul {
            list-style-type: circle;
        }
        
        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0f0f0f;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        #preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        
        .loader-logo {
            width: 80px;
            height: 80px;
            animation: pulse 2s ease-in-out infinite;
        }
        
        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 79, 115, 0.1);
            border-top: 4px solid #FF4F73;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0%, 100% { 
                opacity: 0.6;
                transform: scale(0.95);
            }
            50% { 
                opacity: 1;
                transform: scale(1.05);
            }
        }
        
        /* Hide content until loaded */
        body.loading main,
        body.loading header,
        body.loading footer {
            opacity: 0;
        }
        
        /* Ensure modals are hidden during page load */
        body.loading #registrationModal {
            display: none !important;
            visibility: hidden !important;
        }
        
        /* Custom Animation Classes */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .animate-pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 79, 115, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 79, 115, 0.6); }
        }
        
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-text-shimmer {
            background: linear-gradient(90deg, #FF4F73, #8A6EFA, #FF4F73);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textShimmer 3s linear infinite;
        }
        
        @keyframes textShimmer {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .animate-bounce-in {
            animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
        .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
        .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
        .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
        .stagger-animation > *:nth-child(5) { animation-delay: 0.5s; }
        .stagger-animation > *:nth-child(6) { animation-delay: 0.6s; }
        
        /* Parallax effect */
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Hero Section Enhanced Animations */
        .animate-slide-up {
            animation: slideUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        @keyframes slideUp {
            0% { 
                opacity: 0; 
                transform: translateY(60px); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        .animate-slide-left {
            animation: slideLeft 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        @keyframes slideLeft {
            0% { 
                opacity: 0; 
                transform: translateX(-60px); 
            }
            100% { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }
        
        .animate-slide-right {
            animation: slideRight 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        @keyframes slideRight {
            0% { 
                opacity: 0; 
                transform: translateX(60px); 
            }
            100% { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }
        
        .animate-scale-in {
            animation: scaleIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        @keyframes scaleIn {
            0% { 
                opacity: 0; 
                transform: scale(0.8); 
            }
            100% { 
                opacity: 1; 
                transform: scale(1); 
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        /* Floating Animation for Images */
        .animate-float-slow {
            animation: floatSlow 8s ease-in-out infinite;
        }
        
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(1deg); }
            75% { transform: translateY(10px) rotate(-1deg); }
        }
        
        .animate-float-reverse {
            animation: floatReverse 7s ease-in-out infinite;
        }
        
        @keyframes floatReverse {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(12px) rotate(-1deg); }
            75% { transform: translateY(-18px) rotate(1deg); }
        }
        
        /* Text Glow Animation */
        .animate-glow-text {
            animation: glowText 2s ease-in-out infinite alternate;
        }
        
        @keyframes glowText {
            0% { 
                text-shadow: 0 0 10px rgba(255, 79, 115, 0.5), 0 0 20px rgba(255, 79, 115, 0.3); 
            }
            100% { 
                text-shadow: 0 0 20px rgba(255, 79, 115, 0.8), 0 0 40px rgba(255, 79, 115, 0.5), 0 0 60px rgba(255, 79, 115, 0.3); 
            }
        }
        
        /* Delay classes */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }
        .delay-900 { animation-delay: 0.9s; }
        .delay-1000 { animation-delay: 1s; }
        
        /* Counter Animation */
        .counter-animate {
            display: inline-block;
        }
        
        /* Image shine effect on hover */
        .shine-effect {
            position: relative;
            overflow: hidden;
        }
        
        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to right,
                transparent 0%,
                rgba(255, 255, 255, 0.1) 50%,
                transparent 100%
            );
            transform: rotate(30deg);
            animation: shine 4s ease-in-out infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) rotate(30deg); }
            20%, 100% { transform: translateX(100%) rotate(30deg); }
        }
        
        /* Particle animation background */
        .particles-bg {
            position: relative;
        }
        
        .particles-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 79, 115, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(138, 110, 250, 0.1) 0%, transparent 50%);
            animation: particleMove 15s ease-in-out infinite;
            pointer-events: none;
        }
        
        @keyframes particleMove {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(10px, -10px); }
            50% { transform: translate(-5px, 5px); }
            75% { transform: translate(-10px, -5px); }
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans text-dark-text bg-dark-bg leading-relaxed loading overflow-x-hidden">
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader-container">
            <img src="{{ asset('images/EmoGym-logo.png') }}" alt="Emogym" class="loader-logo">
            <div class="loader"></div>
        </div>
    </div>
    
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <!-- AOS - Animate On Scroll JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Scripts -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50,
            delay: 0,
        });
        
        // Preloader - Hide on page load
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const body = document.body;
            
            // Remove loading class from body
            body.classList.remove('loading');
            
            // Ensure modal stays hidden after page load
            const modal = document.getElementById('registrationModal');
            if (modal) {
                modal.style.display = 'none';
                modal.style.visibility = 'hidden';
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            
            // Hide preloader with fade effect
            setTimeout(function() {
                preloader.classList.add('hidden');
                // Remove from DOM after transition
                setTimeout(function() {
                    preloader.remove();
                }, 500);
            }, 300);
        });
        
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const mobileNav = document.querySelector('.mobile-nav');
            const mobileMenuClose = document.querySelector('.mobile-menu-close');
            const body = document.body;

            function openMobileMenu() {
                mobileNav.classList.add('active');
                body.style.overflow = 'hidden';
            }

            function closeMobileMenu() {
                mobileNav.classList.remove('active');
                body.style.overflow = '';
            }

            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', openMobileMenu);
            }

            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', closeMobileMenu);
            }

            // Close menu when clicking outside
            mobileNav.addEventListener('click', function(e) {
                if (e.target === mobileNav) {
                    closeMobileMenu();
                }
            });

            // Language switching functionality
            const languageButtons = document.querySelectorAll('[data-lang]');
            languageButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    window.location.href = `{{ url('/') }}/lang/${lang}`;
                });
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
