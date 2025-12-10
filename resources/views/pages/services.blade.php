@extends('layouts.app')

@section('title', 'Services - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-12 text-center">
                Our {{ __('navigation.services') }}
            </h1>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-dark-surface p-6 rounded-lg">
                    <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-comments text-primary text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark-text mb-3">Individual Counseling</h3>
                    <p class="text-dark-text-secondary">One-on-one sessions with certified therapists for personalized mental health support.</p>
                </div>
                <div class="bg-dark-surface p-6 rounded-lg">
                    <div class="w-12 h-12 bg-accent/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-accent text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark-text mb-3">Group Therapy</h3>
                    <p class="text-dark-text-secondary">Supportive group sessions to share experiences and learn from others.</p>
                </div>
                <div class="bg-dark-surface p-6 rounded-lg">
                    <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-leaf text-gold text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark-text mb-3">Mindfulness Training</h3>
                    <p class="text-dark-text-secondary">Learn meditation and mindfulness techniques for stress reduction and emotional balance.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
