<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emogym - Emotional Wellness')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Baloo+Tamma+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
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
        html[lang="kn"] * {
            font-family: 'Baloo Tamma 2', sans-serif !important;
        }
        
        /* Keep English font for English language */
        html[lang="en"] body,
        html[lang="en"] * {
            font-family: 'DM Sans', sans-serif !important;
        }
        
        /* Utility classes for manual font switching */
        .font-kannada {
            font-family: 'Baloo Tamma 2', sans-serif !important;
        }
        
        .font-english {
            font-family: 'DM Sans', sans-serif !important;
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans text-dark-text bg-dark-bg leading-relaxed">
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <!-- Scripts -->
    <script>
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
