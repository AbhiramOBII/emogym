@extends('admin.layouts.app')

@section('page-title', 'Add New Banner')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Add New Banner</h1>
    <a href="{{ route('admin.banners.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 text-sm">
        <i class="fas fa-arrow-left"></i>
        <span>Back to Banners</span>
    </a>
</div>

<div class="rounded-lg overflow-hidden shadow-lg p-6" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-white font-medium mb-2">Title (English) <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="title_kn" class="block text-white font-medium mb-2">Title (Kannada)</label>
                <input type="text" name="title_kn" id="title_kn" value="{{ old('title_kn') }}"
                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                @error('title_kn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Description Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="description" class="block text-white font-medium mb-2">Description (English)</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description_kn" class="block text-white font-medium mb-2">Description (Kannada)</label>
                <textarea name="description_kn" id="description_kn" rows="4"
                          class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">{{ old('description_kn') }}</textarea>
                @error('description_kn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Image Upload -->
        <div>
            <label for="image" class="block text-white font-medium mb-2">Banner Image <span class="text-red-500">*</span></label>
            <div class="border-2 border-dashed border-white/20 rounded-lg p-6 text-center hover:border-primary/50 transition-colors">
                <input type="file" name="image" id="image" accept="image/*" required class="hidden" onchange="previewImage(this)">
                <label for="image" class="cursor-pointer">
                    <div id="imagePreview" class="hidden mb-4">
                        <img id="preview" src="" alt="Preview" class="max-h-48 mx-auto rounded-lg">
                    </div>
                    <div id="uploadPlaceholder">
                        <i class="fas fa-cloud-upload-alt text-4xl text-white/50 mb-2"></i>
                        <p class="text-white/70">Click to upload banner image</p>
                        <p class="text-white/50 text-sm">Recommended: 1920x600px, Max 5MB</p>
                    </div>
                </label>
            </div>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Link to Program -->
        <div>
            <label for="program_id" class="block text-white font-medium mb-2">Link to Program (Optional)</label>
            <select name="program_id" id="program_id"
                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                <option value="">-- No Program Link --</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>{{ $program->title }}</option>
                @endforeach
            </select>
            @error('program_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button Text Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="button_text" class="block text-white font-medium mb-2">Button Text (English)</label>
                <input type="text" name="button_text" id="button_text" value="{{ old('button_text', 'Read More') }}"
                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                @error('button_text')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="button_text_kn" class="block text-white font-medium mb-2">Button Text (Kannada)</label>
                <input type="text" name="button_text_kn" id="button_text_kn" value="{{ old('button_text_kn') }}"
                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                @error('button_text_kn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Custom URL -->
        <div>
            <label for="button_url" class="block text-white font-medium mb-2">Custom Button URL (Optional)</label>
            <input type="url" name="button_url" id="button_url" value="{{ old('button_url') }}" placeholder="https://example.com"
                   class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
            <p class="text-white/50 text-sm mt-1">Leave empty to use the linked program's URL</p>
            @error('button_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Order and Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="order" class="block text-white font-medium mb-2">Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-5 h-5 rounded border-white/20 bg-white/10 text-primary focus:ring-primary">
                    <span class="ml-3 text-white font-medium">Active</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('admin.banners.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                Cancel
            </a>
            <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors duration-300 flex items-center gap-2">
                <i class="fas fa-save"></i>
                <span>Create Banner</span>
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
