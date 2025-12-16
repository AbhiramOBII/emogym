@extends('layouts.app')

@section('title', __('programs.upcoming_title') . ' - Emogym')

@section('content')
<div class="min-h-screen bg-white" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                    {{ __('programs.upcoming_title') }} <span class="text-primary">{{ __('programs.programs') }}</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto">
                    {{ __('programs.upcoming_description') }}
                </p>
            </div>

            @if ($programs->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($programs as $program)
                        @php
                            $upcomingDate = $program->availableDates->first();
                            $remainingSlots = $upcomingDate ? $upcomingDate->remainingSlots() : null;
                        @endphp
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105">
                            @if($program->image)
                                <div class="aspect-video overflow-hidden">
                                    <img src="{{ asset('storage/' . $program->image) }}" 
                                         alt="{{ $program->title }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="inline-block bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full mb-3">
                                    {{ __('programs.coming_soon') }}
                                </div>
                                <h3 class="text-xl font-bold text-charcoal mb-3">
                                    @if(app()->getLocale() == 'kn' && $program->title_kn)
                                        {{ $program->title_kn }}
                                    @else
                                        {{ $program->title }}
                                    @endif
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    @if(app()->getLocale() == 'kn' && $program->short_description_kn)
                                        {{ $program->short_description_kn }}
                                    @else
                                        {{ $program->short_description }}
                                    @endif
                                </p>
                                
                                <!-- Pricing -->
                                @if($program->original_price > 0 || $program->cost > 0)
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="text-2xl font-bold text-primary">₹{{ number_format($program->cost, 0) }}</span>
                                        @if($program->original_price && $program->original_price > $program->cost)
                                            <span class="text-lg text-gray-500 line-through">₹{{ number_format($program->original_price, 0) }}</span>
                                            @if($program->discount_percentage)
                                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">{{ number_format($program->discount_percentage, 0) }}% {{ __('programs.off') }}</span>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                                
                                @if($upcomingDate)
                                    <!-- Seats Available -->
                                    <div class="flex items-center justify-between mb-4">
                                        @if($remainingSlots === null)
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-users text-primary"></i>
                                                <span class="text-sm text-gray-600">{{ __('programs.unlimited_seats') }}</span>
                                            </div>
                                        @elseif($remainingSlots > 0)
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-users text-primary"></i>
                                                <span class="text-sm text-gray-600">{{ $remainingSlots }} {{ $remainingSlots === 1 ? __('programs.seat_left') : __('programs.seats_left') }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-users text-red-500"></i>
                                                <span class="text-sm text-red-600 font-semibold">{{ __('programs.fully_booked') }}</span>
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-calendar text-primary"></i>
                                            <span class="text-sm text-gray-600">
                                                {{ $upcomingDate->start_date->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- CTA Button -->
                                <a href="{{ route('programs.show', $program->slug) }}" class="w-full inline-block bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold text-center transition-all duration-300 hover:shadow-lg">
                                    {{ __('programs.view_details') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-600 text-lg">{{ __('programs.no_upcoming') }}</p>
                </div>
            @endif
        </div>
    </section>
</div>

@include('partials.registration-modal')
@endsection
