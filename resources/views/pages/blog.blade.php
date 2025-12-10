@extends('layouts.app')

@section('title', 'Blog - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-12 text-center">
                {{ __('navigation.blog') }}
            </h1>
            <p class="text-xl text-dark-text-secondary mb-12 text-center max-w-3xl mx-auto">
                Insights, tips, and resources for your emotional wellness journey.
            </p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-dark-surface rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-primary to-accent"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark-text mb-3">Understanding Emotional Intelligence</h3>
                        <p class="text-dark-text-secondary mb-4">Learn how emotional intelligence can transform your relationships and career success.</p>
                        <a href="#" class="text-primary hover:text-primary/80 font-semibold">Read More →</a>
                    </div>
                </article>
                <article class="bg-dark-surface rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-accent to-gold"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark-text mb-3">5 Daily Habits for Better Mental Health</h3>
                        <p class="text-dark-text-secondary mb-4">Simple practices you can incorporate into your daily routine for improved well-being.</p>
                        <a href="#" class="text-primary hover:text-primary/80 font-semibold">Read More →</a>
                    </div>
                </article>
                <article class="bg-dark-surface rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-gold to-primary"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-dark-text mb-3">Managing Anxiety in the Modern World</h3>
                        <p class="text-dark-text-secondary mb-4">Practical strategies for dealing with anxiety and stress in today's fast-paced environment.</p>
                        <a href="#" class="text-primary hover:text-primary/80 font-semibold">Read More →</a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
