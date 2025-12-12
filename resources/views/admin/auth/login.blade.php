<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #FF6B35;
        }
        .bg-primary { background-color: var(--primary); }
        .text-primary { color: var(--primary); }
        .border-primary { border-color: var(--primary); }
        .hover\:bg-primary:hover { background-color: var(--primary); }
    </style>
</head>
<body class="font-sans antialiased" style="background-color: #1a1a1a;">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/EmoGym-logo.png') }}" alt="Emogym" class="h-24 mx-auto mb-4">
                <h1 class="text-3xl font-bold text-white">Admin Panel</h1>
                <p class="text-white/70 mt-2">Sign in to manage your programs</p>
            </div>

            <!-- Login Form -->
            <div class="rounded-lg p-8 shadow-2xl" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-lg text-white" style="background-color: rgba(34, 197, 94, 0.2); border-left: 4px solid #22c55e;">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg text-white" style="background-color: rgba(239, 68, 68, 0.2); border-left: 4px solid #ef4444;">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-white/70 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-white/50"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-12 pr-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all duration-200"
                                placeholder="admin@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-white/70 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-white/50"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-12 pr-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all duration-200"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-6">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="remember" 
                                class="w-5 h-5 rounded bg-white/10 border-white/20 text-primary focus:ring-primary focus:ring-offset-0">
                            <span class="text-white/70">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign In</span>
                    </button>
                </form>

                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to Website</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
