<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emogym - Emotional Wellness')</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('images/EmoGym-logo.png') }}" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Baloo+Tamma+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <!-- Font Awesome - Load before Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>
    
    @stack('styles')
</head>
<body class="font-sans text-dark-text bg-dark-bg leading-relaxed loading">
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
    
    <!-- Scripts -->
    <script>
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
