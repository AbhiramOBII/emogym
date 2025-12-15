@extends('admin.layouts.app')

@section('page-title', 'Add Program Date')

@section('content')
<div class="max-w-6xl">
    <div class="mb-4">
        <a href="{{ route('admin.programs.dates.index', $program) }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Program Dates</span>
        </a>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <h2 class="text-xl font-bold text-white mb-1">Add New Date</h2>
        <p class="text-white/70 mb-4 text-sm">{{ $program->title }}</p>

        <form action="{{ route('admin.programs.dates.store', $program) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-white/70 mb-1 text-sm">Start Date <span class="text-red-500">*</span></label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('start_date')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-white/70 mb-1 text-sm">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('end_date')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Time -->
                <div>
                    <label for="start_time" class="block text-white/70 mb-1 text-sm">Start Time</label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('start_time')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Time -->
                <div>
                    <label for="end_time" class="block text-white/70 mb-1 text-sm">End Time</label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('end_time')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Max Participants -->
                <div>
                    <label for="max_participants" class="block text-white/70 mb-1 text-sm">Max Participants</label>
                    <input type="number" name="max_participants" id="max_participants" value="{{ old('max_participants') }}" min="1"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="Leave empty for unlimited">
                    @error('max_participants')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Participants -->
                <div>
                    <label for="current_participants" class="block text-white/70 mb-1 text-sm">Current Participants</label>
                    <input type="number" name="current_participants" id="current_participants" value="{{ old('current_participants', 0) }}" min="0"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('current_participants')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes (English) -->
                <div class="md:col-span-2">
                    <label for="notes" class="block text-white/70 mb-1 text-sm">Notes (English)</label>
                    <textarea name="notes" id="notes" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="Any additional notes or information">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes (Kannada) -->
                <div class="md:col-span-2">
                    <label for="notes_kn" class="block text-white/70 mb-1 text-sm">Notes (ಕನ್ನಡ)</label>
                    <textarea name="notes_kn" id="notes_kn" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="ಹೆಚ್ಚುವರಿ ಟಿಪ್ಪಣಿಗಳು">{{ old('notes_kn') }}</textarea>
                    @error('notes_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Available -->
                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}
                            class="w-4 h-4 rounded bg-white/10 border-white/20 text-primary focus:ring-primary focus:ring-offset-0">
                        <span class="text-white/70 text-sm">Available for booking</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                    <i class="fas fa-save"></i>
                    <span>Add Date</span>
                </button>
                <a href="{{ route('admin.programs.dates.index', $program) }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition-colors duration-300 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
