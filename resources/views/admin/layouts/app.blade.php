<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('images/EmoGym-logo.png') }}" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    
    <style>
        :root {
            --primary: #FF6B35;
            --dark-bg: #1a1a1a;
            --dark-card: #262626;
            --dark-text: #e5e5e5;
        }
        
        .bg-primary { background-color: var(--primary); }
        .text-primary { color: var(--primary); }
        .border-primary { border-color: var(--primary); }
        .hover\:bg-primary:hover { background-color: var(--primary); }
        .hover\:text-primary:hover { color: var(--primary); }
        
        .sidebar-link {
            transition: all 0.3s ease;
        }
        
        .sidebar-link:hover {
            background-color: rgba(255, 107, 53, 0.1);
            border-left: 4px solid var(--primary);
            padding-left: 1.5rem;
        }
        
        .sidebar-link.active {
            background-color: rgba(255, 107, 53, 0.15);
            border-left: 4px solid var(--primary);
            padding-left: 1.5rem;
        }
        
        /* CKEditor Dark Theme */
        .ck-editor__editable {
            min-height: 200px;
            background-color: #2d2d2d !important;
            color: #e5e5e5 !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
        }
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: rgba(255, 255, 255, 0.2) !important;
        }
        .ck.ck-toolbar {
            background-color: #1f1f1f !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
        }
        .ck.ck-button:not(.ck-disabled):hover, .ck.ck-button.ck-on {
            background-color: rgba(255, 107, 53, 0.3) !important;
        }
        .ck.ck-toolbar .ck-button .ck-icon {
            color: #e5e5e5 !important;
        }
        .ck.ck-toolbar .ck-button__label {
            color: #e5e5e5 !important;
        }
        .ck-content p, .ck-content h1, .ck-content h2, .ck-content h3, .ck-content h4, .ck-content h5, .ck-content h6, .ck-content li {
            color: #e5e5e5 !important;
        }
        
        /* Select dropdown styling */
        select option {
            background-color: #2d2d2d;
            color: #e5e5e5;
        }
        select {
            color: #e5e5e5 !important;
        }
    </style>
</head>
<body class="font-sans antialiased" style="background-color: #1a1a1a;">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 shadow-xl" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/EmoGym-logo.png') }}" alt="Emogym" class="h-16 w-auto">
                </div>
                <p class="text-white/70 text-sm mt-2">Admin Panel</p>
            </div>
            
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.programs.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt w-5"></i>
                            <span>Programs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.registrations.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                            <i class="fas fa-user-check w-5"></i>
                            <span>Registrations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                            <i class="fas fa-blog w-5"></i>
                            <span>Blogs</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('admin.services.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <i class="fas fa-concierge-bell w-5"></i>
                            <span>Services</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{ route('admin.photos.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.photos.*') ? 'active' : '' }}">
                            <i class="fas fa-images w-5"></i>
                            <span>Photos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.videos.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                            <i class="fas fa-video w-5"></i>
                            <span>Videos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.banners.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                            <i class="fas fa-image w-5"></i>
                            <span>Banners</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <i class="fas fa-comments w-5"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                            <i class="fas fa-external-link-alt w-5"></i>
                            <span>View Website</span>
                        </a>
                    </li> -->
                </ul>
            </nav>
            
            <div class="absolute bottom-0 w-64 p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg w-full">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Bar -->
            <header class="shadow-lg py-4 px-6" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center gap-6">
                        <!-- Language Switcher -->
                        <!-- <div class="flex items-center gap-2">
                            <span class="text-xs text-white/70 uppercase tracking-wide hidden sm:block">Language:</span>
                            <div class="flex gap-2">
                                <button 
                                    data-lang="en" 
                                    class="admin-lang-btn group relative w-10 h-10 {{ app()->getLocale() == 'en' ? 'bg-primary' : 'bg-white/20 hover:bg-primary' }} rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95" 
                                    title="English">
                                    <span class="text-white group-hover:text-white transition-colors duration-300 text-sm font-bold">EN</span>
                                </button>
                                <button 
                                    data-lang="kn" 
                                    class="admin-lang-btn group relative w-10 h-10 {{ app()->getLocale() == 'kn' ? 'bg-primary' : 'bg-white/20 hover:bg-primary' }} rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95" 
                                    title="ಕನ್ನಡ">
                                    <span class="text-white group-hover:text-white transition-colors duration-300 text-sm font-bold">ಕ</span>
                                </button>
                            </div>
                        </div> -->
                        
                        <!-- User Info -->
                        <div class="flex items-center gap-3 border-l border-white/20 pl-6">
                            <span class="text-white/70">{{ Auth::user()->name }}</span>
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg text-white" style="background-color: rgba(34, 197, 94, 0.2); border-left: 4px solid #22c55e;">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 rounded-lg text-white" style="background-color: rgba(239, 68, 68, 0.2); border-left: 4px solid #ef4444;">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // Language switcher for admin panel
        document.querySelectorAll('.admin-lang-btn').forEach(button => {
            button.addEventListener('click', function() {
                const lang = this.getAttribute('data-lang');
                window.location.href = '/lang/' + lang;
            });
        });
    </script>
</body>
</html>
