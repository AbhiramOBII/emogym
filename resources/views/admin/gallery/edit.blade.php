@extends('admin.layouts.app')

@section('page-title', 'Edit Gallery Item')

@section('content')
<div class="max-w-6xl">
    <div class="mb-4">
        <a href="{{ route('admin.gallery.index') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Gallery</span>
        </a>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <h2 class="text-xl font-bold text-white mb-4">Edit Gallery Item</h2>

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" id="galleryForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Type -->
                <div class="md:col-span-2">
                    <label class="block text-white/70 mb-2 text-sm">Type <span class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="type" value="image" {{ old('type', $gallery->type) === 'image' ? 'checked' : '' }} class="text-primary focus:ring-primary" onchange="toggleTypeFields()">
                            <span class="text-white"><i class="fas fa-image mr-1"></i> Image</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="type" value="video" {{ old('type', $gallery->type) === 'video' ? 'checked' : '' }} class="text-primary focus:ring-primary" onchange="toggleTypeFields()">
                            <span class="text-white"><i class="fas fa-video mr-1"></i> Video</span>
                        </label>
                    </div>
                    @error('type')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title (English) -->
                <div>
                    <label for="title" class="block text-white/70 mb-1 text-sm">Title (English) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title (Kannada) -->
                <div>
                    <label for="title_kn" class="block text-white/70 mb-1 text-sm">Title (ಕನ್ನಡ)</label>
                    <input type="text" name="title_kn" id="title_kn" value="{{ old('title_kn', $gallery->title_kn) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('title_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description (English) -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-white/70 mb-1 text-sm">Description (English)</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('description', $gallery->description) }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description (Kannada) -->
                <div class="md:col-span-2">
                    <label for="description_kn" class="block text-white/70 mb-1 text-sm">Description (ಕನ್ನಡ)</label>
                    <textarea name="description_kn" id="description_kn" rows="3"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('description_kn', $gallery->description_kn) }}</textarea>
                    @error('description_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image Preview -->
                @if($gallery->type === 'image' && $gallery->file_path)
                    <div class="md:col-span-2" id="currentImage">
                        <label class="block text-white/70 mb-1 text-sm">Current Image</label>
                        <img src="{{ asset('storage/' . $gallery->file_path) }}" alt="{{ $gallery->title }}" class="w-48 h-32 object-cover rounded-lg border border-white/20">
                    </div>
                @endif

                <!-- Image Upload -->
                <div class="md:col-span-2" id="imageField" style="display: {{ old('type', $gallery->type) === 'image' ? 'block' : 'none' }};">
                    <label for="file" class="block text-white/70 mb-1 text-sm">{{ $gallery->type === 'image' ? 'Replace Image' : 'Image File' }}</label>
                    <input type="file" name="file" id="file" accept="image/*"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white file:text-xs hover:file:bg-primary/90 transition-all duration-200">
                    <p class="text-white/50 text-xs mt-1">Max size: 5MB. Formats: JPG, PNG, GIF, WebP</p>
                    @error('file')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Video URL -->
                <div class="md:col-span-2" id="videoField" style="display: {{ old('type', $gallery->type) === 'video' ? 'block' : 'none' }};">
                    <label for="video_url" class="block text-white/70 mb-1 text-sm">Video URL <span class="text-red-500">*</span></label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $gallery->video_url) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="https://www.youtube.com/watch?v=... or https://vimeo.com/...">
                    <p class="text-white/50 text-xs mt-1">Supports YouTube and Vimeo URLs</p>
                    @error('video_url')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Thumbnail Preview -->
                @if($gallery->type === 'video' && $gallery->thumbnail)
                    <div class="md:col-span-2" id="currentThumbnail" style="display: {{ old('type', $gallery->type) === 'video' ? 'block' : 'none' }};">
                        <label class="block text-white/70 mb-1 text-sm">Current Thumbnail</label>
                        <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->title }}" class="w-48 h-32 object-cover rounded-lg border border-white/20">
                    </div>
                @endif

                <!-- Video Thumbnail -->
                <div class="md:col-span-2" id="thumbnailField" style="display: {{ old('type', $gallery->type) === 'video' ? 'block' : 'none' }};">
                    <label for="thumbnail" class="block text-white/70 mb-1 text-sm">{{ $gallery->thumbnail ? 'Replace Thumbnail' : 'Video Thumbnail' }} (Optional)</label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white file:text-xs hover:file:bg-primary/90 transition-all duration-200">
                    <p class="text-white/50 text-xs mt-1">Custom thumbnail for video. Max size: 2MB</p>
                    @error('thumbnail')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-white/70 mb-1 text-sm">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $gallery->order) }}" min="0"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    <p class="text-white/50 text-xs mt-1">Lower numbers appear first</p>
                    @error('order')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div>
                    <label class="block text-white/70 mb-1 text-sm">Status</label>
                    <label class="flex items-center gap-2 cursor-pointer mt-2">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                            class="rounded text-primary focus:ring-primary">
                        <span class="text-white text-sm">Active (visible on website)</span>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                    <i class="fas fa-save"></i>
                    <span>Update Item</span>
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition-colors duration-300 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleTypeFields() {
        const type = document.querySelector('input[name="type"]:checked').value;
        const imageField = document.getElementById('imageField');
        const videoField = document.getElementById('videoField');
        const thumbnailField = document.getElementById('thumbnailField');
        const currentImage = document.getElementById('currentImage');
        const currentThumbnail = document.getElementById('currentThumbnail');
        
        if (type === 'image') {
            imageField.style.display = 'block';
            videoField.style.display = 'none';
            thumbnailField.style.display = 'none';
            if (currentImage) currentImage.style.display = 'block';
            if (currentThumbnail) currentThumbnail.style.display = 'none';
            document.getElementById('video_url').required = false;
        } else {
            imageField.style.display = 'none';
            videoField.style.display = 'block';
            thumbnailField.style.display = 'block';
            if (currentImage) currentImage.style.display = 'none';
            if (currentThumbnail) currentThumbnail.style.display = 'block';
            document.getElementById('video_url').required = true;
        }
    }
</script>
@endsection
