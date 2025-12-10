@extends('layouts.app')

@section('title', 'Programs - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-12 text-center">
                Our {{ __('navigation.programs') }}
            </h1>
            <p class="text-xl text-dark-text-secondary mb-12 text-center max-w-3xl mx-auto">
                Comprehensive programs designed to support your emotional wellness journey at every stage.
            </p>
            <div class="space-y-8">
                <div class="bg-dark-surface p-8 rounded-lg">
                    <h3 class="text-2xl font-semibold text-dark-text mb-4">Emotional Fitness Program</h3>
                    <p class="text-dark-text-secondary mb-4">A 12-week comprehensive program focusing on building emotional resilience and mental strength.</p>
                    <ul class="text-dark-text-secondary space-y-2">
                        <li>• Weekly group sessions</li>
                        <li>• Individual coaching</li>
                        <li>• Practical exercises and tools</li>
                        <li>• Progress tracking and assessment</li>
                    </ul>
                </div>
                <div class="bg-dark-surface p-8 rounded-lg">
                    <h3 class="text-2xl font-semibold text-dark-text mb-4">Stress Management Workshop</h3>
                    <p class="text-dark-text-secondary mb-4">Learn effective techniques to manage stress and anxiety in daily life.</p>
                    <ul class="text-dark-text-secondary space-y-2">
                        <li>• Breathing techniques</li>
                        <li>• Time management strategies</li>
                        <li>• Relaxation methods</li>
                        <li>• Workplace stress solutions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
