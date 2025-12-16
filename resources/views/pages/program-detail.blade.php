@extends('layouts.app')

@section('title', $program->title . ' - Emogym')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <!-- Hero Section with Program Image -->
    <section class="relative h-96 overflow-hidden">
        @if($program->image)
            <img src="{{ asset('storage/' . $program->image) }}" 
                 alt="{{ $program->title }}"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-black/30"></div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-accent/20"></div>
        @endif
        
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 h-full flex items-end pb-12">
            <div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                    @if(app()->getLocale() == 'kn' && $program->title_kn)
                        {{ $program->title_kn }}
                    @else
                        {{ $program->title }}
                    @endif
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl">
                    @if(app()->getLocale() == 'kn' && $program->short_description_kn)
                        {{ $program->short_description_kn }}
                    @else
                        {{ $program->short_description }}
                    @endif
                </p>
            </div>
        </div>
    </section>

    <!-- Program Details Section -->
    <section class="py-16 px-4" style="background-color: #1a1a1a; background-image: radial-gradient(circle at 1px 1px, rgba(255, 79, 115, 0.15) 1px, transparent 0); background-size: 20px 20px;">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Description -->
                    <div class="bg-dark-card rounded-2xl shadow-lg p-8 mb-8 border border-white/10">
                        <h2 class="text-2xl font-bold text-white mb-4">{{ __('programs.about_program') }}</h2>
                        <div class="prose prose-lg max-w-none text-white/80">
                            @if(app()->getLocale() == 'kn' && $program->description_kn)
                                {!! $program->description_kn !!}
                            @else
                                {!! $program->description !!}
                            @endif
                        </div>
                    </div>

                    <!-- What You'll Learn -->
                    @if($program->what_you_learn || $program->what_you_learn_kn)
                        <div class="bg-dark-card rounded-2xl shadow-lg p-8 mb-8 border border-white/10">
                            <h2 class="text-2xl font-bold text-white mb-4">{{ __('programs.what_you_learn') }}</h2>
                            <div class="prose prose-lg max-w-none text-white/80">
                                @if(app()->getLocale() == 'kn' && $program->what_you_learn_kn)
                                    {!! $program->what_you_learn_kn !!}
                                @else
                                    {!! $program->what_you_learn !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Requirements -->
                    @if($program->requirements || $program->requirements_kn)
                        <div class="bg-dark-card rounded-2xl shadow-lg p-8 border border-white/10">
                            <h2 class="text-2xl font-bold text-white mb-4">{{ __('programs.requirements') }}</h2>
                            <div class="prose prose-lg max-w-none text-white/80">
                                @if(app()->getLocale() == 'kn' && $program->requirements_kn)
                                    {!! $program->requirements_kn !!}
                                @else
                                    {!! $program->requirements !!}
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Registration Card -->
                    <div class="bg-dark-card rounded-2xl shadow-lg p-6 sticky top-24 border border-white/10">
                        <!-- Pricing -->
                        @if($program->original_price > 0 || $program->cost > 0)
                            <div class="mb-6">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-3xl font-bold text-primary">₹{{ number_format($program->cost, 0) }}</span>
                                    @if($program->original_price && $program->original_price > $program->cost)
                                        <span class="text-xl text-white/50 line-through">₹{{ number_format($program->original_price, 0) }}</span>
                                    @endif
                                </div>
                                @if($program->discount_percentage)
                                    <span class="inline-block bg-green-500/20 text-green-400 text-sm font-semibold px-3 py-1 rounded-full">
                                        {{ number_format($program->discount_percentage, 0) }}% {{ __('programs.off') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <!-- Program Info -->
                        <div class="space-y-4 mb-6">
                            @if($program->duration)
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-clock text-primary text-xl w-6"></i>
                                    <div>
                                        <p class="text-sm text-white/60">{{ __('programs.duration') }}</p>
                                        <p class="font-semibold text-white">{{ $program->duration }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($program->level)
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-signal text-primary text-xl w-6"></i>
                                    <div>
                                        <p class="text-sm text-white/60">{{ __('programs.level') }}</p>
                                        <p class="font-semibold text-white">{{ ucfirst($program->level) }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($program->format)
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-laptop text-primary text-xl w-6"></i>
                                    <div>
                                        <p class="text-sm text-white/60">{{ __('programs.format') }}</p>
                                        <p class="font-semibold text-white">{{ ucfirst($program->format) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Available Dates -->
                        @if($program->availableDates->isNotEmpty())
                            <div class="mb-6">
                                <h3 class="font-bold text-white mb-3">{{ __('programs.date_and_time') }}</h3>
                                <div class="space-y-3">
                                    @foreach($program->availableDates as $date)
                                        @php
                                            $remainingSlots = $date->remainingSlots();
                                            $startTime = $date->start_time
                                                ? \Illuminate\Support\Carbon::parse($date->start_time)->format('h:i A')
                                                : null;
                                            $endTime = $date->end_time
                                                ? \Illuminate\Support\Carbon::parse($date->end_time)->format('h:i A')
                                                : null;
                                        @endphp
                                        <div class="border border-white/20 rounded-lg p-3 bg-white/5">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm font-semibold text-white">
                                                    {{ $date->start_date->format('M d, Y') }}
                                                    @if($date->end_date && !$date->start_date->isSameDay($date->end_date))
                                                        - {{ $date->end_date->format('M d, Y') }}
                                                    @endif
                                                </span>
                                            </div>
                                            @if($startTime || $endTime)
                                                <div class="flex items-center justify-between mb-2">
                                                    <span class="text-sm font-semibold text-white">
                                                        {{ $startTime ?? 'TBD' }}
                                                        @if($endTime)
                                                            - {{ $endTime }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif

                                            @if($remainingSlots === null)
                                                <span class="text-xs text-green-400">{{ __('programs.unlimited_seats') }}</span>
                                            @elseif($remainingSlots > 0)
                                                <span class="text-xs text-green-400">{{ $remainingSlots }} {{ $remainingSlots === 1 ? __('programs.seat_left') : __('programs.seats_left') }}</span>
                                            @else
                                                <span class="text-xs text-red-400 font-semibold">{{ __('programs.fully_booked') }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Register Button -->
                        @php
                            $upcomingDate = $program->availableDates->first();
                            $remainingSlots = $upcomingDate ? $upcomingDate->remainingSlots() : null;
                        @endphp
                        
                        @if($remainingSlots === 0)
                            <button disabled class="w-full bg-gray-400 cursor-not-allowed text-white py-4 rounded-full font-semibold text-lg">
                                <i class="fas fa-times-circle"></i> {{ __('programs.fully_booked') }}
                            </button>
                        @elseif($program->program_type === 'upcoming')
                            <button disabled class="w-full bg-gray-400 cursor-not-allowed text-white py-4 rounded-full font-semibold text-lg">
                                <i class="fas fa-times-circle"></i> {{ __('home.upcoming') }}
                            </button>
                        @else
                            <button onclick="openRegistrationModal(
                                {{ $program->id }}, 
                                '{{ addslashes($program->title) }}', 
                                '₹{{ number_format($program->cost, 0) }}', 
                                '{{ $upcomingDate ? $upcomingDate->start_date->format('M d, Y') : 'TBD' }}',
                                {{ $upcomingDate ? $upcomingDate->id : 'null' }},
                                {{ $program->original_price ? "'₹" . number_format($program->original_price, 0) . "'" : 'null' }},
                                {{ $program->discount_percentage ? $program->discount_percentage : 'null' }}
                            )" class="w-full bg-primary hover:bg-primary/90 text-white py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:shadow-xl">
                                {{ __('programs.register_now') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('partials.registration-modal')
@endsection
