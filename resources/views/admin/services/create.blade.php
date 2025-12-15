@extends('admin.layouts.app')

@section('page-title', 'Create Service')

@section('content')
<div class="mb-4">
    <h1 class="text-2xl font-bold text-white">Create New Service</h1>
    <p class="text-white/60 text-sm mt-1">Add a new service to your website</p>
</div>

<div class="rounded-lg shadow-lg p-6" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Title (English) -->
            <div>
                <label for="title" class="block text-white/70 mb-1 text-sm">Title (English) <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    placeholder="Enter title in English">
                @error('title')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title (Kannada) -->
            <div>
                <label for="title_kn" class="block text-white/70 mb-1 text-sm">Title (ಕನ್ನಡ)</label>
                <input type="text" name="title_kn" id="title_kn" value="{{ old('title_kn') }}"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    placeholder="ಶೀರ್ಷಿಕೆ ನಮೂದಿಸಿ">
                @error('title_kn')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description (English) -->
            <div class="md:col-span-2">
                <label for="description" class="block text-white/70 mb-1 text-sm">Description (English) <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="3" required
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    placeholder="Enter description in English">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description (Kannada) -->
            <div class="md:col-span-2">
                <label for="description_kn" class="block text-white/70 mb-1 text-sm">Description (ಕನ್ನಡ)</label>
                <textarea name="description_kn" id="description_kn" rows="3"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    placeholder="ವಿವರಣೆ ನಮೂದಿಸಿ">{{ old('description_kn') }}</textarea>
                @error('description_kn')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail Upload -->
            <div class="md:col-span-2">
                <label class="block text-white/70 mb-2 text-sm">Thumbnail Image <span class="text-red-500">*</span></label>
                
                <!-- Image Preview -->
                <div class="mb-3 p-4 bg-white/5 rounded-lg border border-white/10">
                    <div id="imagePreview" class="hidden mb-3">
                        <img id="preview" src="" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <label for="thumbnail" class="cursor-pointer">
                        <div id="uploadPlaceholder" class="flex flex-col items-center justify-center py-8 border-2 border-dashed border-white/20 rounded-lg hover:border-primary/50 transition-colors duration-200">
                            <i class="fas fa-cloud-upload-alt text-4xl text-white/30 mb-2"></i>
                            <p class="text-white/50 text-sm">Click to upload or drag and drop</p>
                            <p class="text-white/30 text-xs mt-1">PNG, JPG, GIF, WEBP up to 2MB</p>
                        </div>
                    </label>
                </div>

                <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    onchange="previewImage(event)">
                @error('thumbnail')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-white/70 mb-1 text-sm">Display Order <span class="text-red-500">*</span></label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0" required
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                    placeholder="0">
                @error('order')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="w-4 h-4 text-primary bg-white/10 border-white/20 rounded focus:ring-primary focus:ring-2">
                    <span class="text-white text-sm">Active (visible on website)</span>
                </label>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex gap-3 mt-6">
            <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                <i class="fas fa-save"></i>
                <span>Create Service</span>
            </button>
            <a href="{{ route('admin.services.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition-colors duration-300 text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('uploadPlaceholder').classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
