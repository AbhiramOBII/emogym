@extends('layouts.app')

@section('title', 'About - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-8 text-center">
                {{ __('about.title') }}
            </h1>
            <div class="prose prose-lg prose-invert max-w-none">
                <p class="text-xl text-dark-text-secondary mb-6 text-center">
                    {{ __('about.description') }}
                </p>
                <div class="bg-dark-surface p-8 rounded-lg">
                    <h2 class="text-2xl font-semibold text-dark-text mb-4">{{ __('about.our_mission') }}</h2>
                    <p class="text-dark-text-secondary mb-6">
                        {{ __('about.mission_text') }}
                    </p>
                    <h2 class="text-2xl font-semibold text-dark-text mb-4">{{ __('about.our_vision') }}</h2>
                    <p class="text-dark-text-secondary">
                        {{ __('about.vision_text') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
