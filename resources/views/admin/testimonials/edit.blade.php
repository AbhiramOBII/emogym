@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-2 text-white/60 hover:text-white transition-colors">
            <i class="fas fa-arrow-left"></i>
            Back to Testimonials
        </a>
    </div>

    <div class="bg-white/5 rounded-2xl border border-white/10 p-6">
        <h2 class="text-xl font-bold text-white mb-6">Edit Testimonial</h2>

        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-white/70 mb-2 text-sm">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" required
                        class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Occupation -->
                <div>
                    <label for="occupation" class="block text-white/70 mb-2 text-sm">Occupation</label>
                    <input type="text" name="occupation" id="occupation" value="{{ old('occupation', $testimonial->occupation) }}"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('occupation')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-white/70 mb-2 text-sm">Rating <span class="text-red-500">*</span></label>
                    <select name="rating" id="rating" required
                        class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                    @error('rating')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Story -->
                <div>
                    <label for="story" class="block text-white/70 mb-2 text-sm">Story <span class="text-red-500">*</span></label>
                    <textarea name="story" id="story" rows="5" required
                        class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('story', $testimonial->story) }}</textarea>
                    @error('story')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-white/70 mb-2 text-sm">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $testimonial->order) }}" min="0"
                        class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    <p class="text-white/40 text-xs mt-1">Lower numbers appear first</p>
                    @error('order')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Approval Status -->
                <div>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_approved" value="1" {{ old('is_approved', $testimonial->is_approved) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-white/20 bg-white/10 text-primary focus:ring-primary/50">
                        <span class="text-white">Approved (Show on website)</span>
                    </label>
                </div>

                <!-- Submit -->
                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg font-semibold transition-all duration-200">
                        Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg font-semibold transition-all duration-200">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
