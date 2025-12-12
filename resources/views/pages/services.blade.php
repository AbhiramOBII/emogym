@extends('layouts.app')

@section('title', 'Services - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-text mb-12 text-center">
                {{ __('services.title') }} {{ __('navigation.services') }}
            </h1>
            
            @if($services->isEmpty())
                <div class="text-center py-16">
                    <i class="fas fa-concierge-bell text-6xl text-white/20 mb-4"></i>
                    <p class="text-dark-text-secondary text-lg">{{ __('services.no_services') }}</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="bg-dark-surface rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            @if($service->thumbnail)
                                <div class="w-full h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $service->thumbnail) }}" 
                                         alt="{{ $service->title }}" 
                                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-dark-text mb-3">
                                    @if(app()->getLocale() == 'kn' && $service->title_kn)
                                        {{ $service->title_kn }}
                                    @else
                                        {{ $service->title }}
                                    @endif
                                </h3>
                                <p class="text-dark-text-secondary">
                                    @if(app()->getLocale() == 'kn' && $service->description_kn)
                                        {{ $service->description_kn }}
                                    @else
                                        {{ $service->description }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
