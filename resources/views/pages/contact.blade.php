@extends('layouts.app')

@section('title', 'Contact - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-12 text-center">
                {{ __('contact.title') }}
            </h1>
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-dark-surface p-8 rounded-lg">
                    <h2 class="text-2xl font-semibold text-dark-text mb-6">{{ __('contact.get_in_touch') }}</h2>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-dark-text mb-2">{{ __('contact.name') }}</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-dark-card border border-gray-600 rounded-lg text-dark-text focus:border-primary focus:outline-none">
                        </div>
                        <div>
                            <label for="email" class="block text-dark-text mb-2">{{ __('contact.email') }}</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-dark-card border border-gray-600 rounded-lg text-dark-text focus:border-primary focus:outline-none">
                        </div>
                        <div>
                            <label for="phone" class="block text-dark-text mb-2">{{ __('contact.phone') }}</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 bg-dark-card border border-gray-600 rounded-lg text-dark-text focus:border-primary focus:outline-none">
                        </div>
                        <div>
                            <label for="message" class="block text-dark-text mb-2">{{ __('contact.message') }}</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-dark-card border border-gray-600 rounded-lg text-dark-text focus:border-primary focus:outline-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-semibold transition-colors duration-300">
                            {{ __('contact.send') }}
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-dark-surface p-8 rounded-lg">
                        <h2 class="text-2xl font-semibold text-dark-text mb-6">{{ __('contact.contact_info') }}</h2>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                                <div>
                                    <p class="text-dark-text font-semibold">{{ __('contact.phone') }}</p>
                                    <p class="text-dark-text-secondary">+91-9964 33 12 00</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-accent/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-envelope text-accent"></i>
                                </div>
                                <div>
                                    <p class="text-dark-text font-semibold">{{ __('contact.email') }}</p>
                                    <p class="text-dark-text-secondary">info@emogym.com</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-gold"></i>
                                </div>
                                <div>
                                    <p class="text-dark-text font-semibold">{{ __('contact.address') }}</p>
                                    <p class="text-dark-text-secondary">Bangalore, Karnataka, India</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-dark-surface p-8 rounded-lg">
                        <h3 class="text-xl font-semibold text-dark-text mb-4">{{ __('contact.office_hours') }}</h3>
                        <div class="space-y-2 text-dark-text-secondary">
                            <p>{{ __('contact.monday_friday') }}: 9:00 AM - 6:00 PM</p>
                            <p>{{ __('contact.saturday') }}: 10:00 AM - 4:00 PM</p>
                            <p>{{ __('contact.sunday') }}: {{ __('contact.closed') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
