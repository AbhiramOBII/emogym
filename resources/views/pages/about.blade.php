@extends('layouts.app')

@section('title', 'About - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-8 text-center">
                {{ __('navigation.about') }} Emogym
            </h1>
            <div class="prose prose-lg prose-invert max-w-none">
                <p class="text-xl text-dark-text-secondary mb-6 text-center">
                    Emogym is dedicated to promoting emotional wellness and mental health through innovative programs and expert guidance.
                </p>
                <div class="bg-dark-surface p-8 rounded-lg">
                    <h2 class="text-2xl font-semibold text-dark-text mb-4">Our Mission</h2>
                    <p class="text-dark-text-secondary mb-6">
                        To provide accessible, effective, and compassionate mental health support that empowers individuals to achieve emotional balance and well-being.
                    </p>
                    <h2 class="text-2xl font-semibold text-dark-text mb-4">Our Vision</h2>
                    <p class="text-dark-text-secondary">
                        A world where mental health is prioritized, stigma is eliminated, and everyone has access to the tools they need for emotional wellness.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
