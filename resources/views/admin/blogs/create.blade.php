@extends('admin.layouts.app')

@section('page-title', 'Create Blog Post')

@section('content')
<div class="max-w-6xl">
    <div class="mb-4">
        <a href="{{ route('admin.blogs.index') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Blogs</span>
        </a>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <h2 class="text-xl font-bold text-white mb-4">Create New Blog Post</h2>

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Title (English) -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-white/70 mb-1 text-sm">Title (English) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="Enter blog title in English">
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

                <!-- Slug -->
                <div class="md:col-span-2">
                    <label for="slug" class="block text-white/70 mb-1 text-sm">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="auto-generated-from-title">
                    @error('slug')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author (English) -->
                <div>
                    <label for="author" class="block text-white/70 mb-1 text-sm">Author (English)</label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="Author name">
                    @error('author')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author (Kannada) -->
                <div>
                    <label for="author_kn" class="block text-white/70 mb-1 text-sm">Author (ಕನ್ನಡ)</label>
                    <input type="text" name="author_kn" id="author_kn" value="{{ old('author_kn') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="ಲೇಖಕರ ಹೆಸರು">
                    @error('author_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-3">
                    <label for="image" class="block text-white/70 mb-1 text-sm">Featured Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white file:text-xs hover:file:bg-primary/90 transition-all duration-200">
                    @error('image')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt (English) -->
                <div class="md:col-span-3">
                    <label for="excerpt" class="block text-white/70 mb-1 text-sm">Excerpt (English) <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="Brief summary in English (max 500 characters)">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt (Kannada) -->
                <div class="md:col-span-3">
                    <label for="excerpt_kn" class="block text-white/70 mb-1 text-sm">Excerpt (ಕನ್ನಡ)</label>
                    <textarea name="excerpt_kn" id="excerpt_kn" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="ಸಂಕ್ಷಿಪ್ತ ಸಾರಾಂಶ">{{ old('excerpt_kn') }}</textarea>
                    @error('excerpt_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content (English) -->
                <div class="md:col-span-3">
                    <label for="content" class="block text-white/70 mb-1 text-sm">Content (English) <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="15"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p id="content-error" class="text-red-400 text-xs mt-1" style="display: none;">Content is required</p>
                </div>

                <!-- Content (Kannada) -->
                <div class="md:col-span-3">
                    <label for="content_kn" class="block text-white/70 mb-1 text-sm">Content (ಕನ್ನಡ)</label>
                    <textarea name="content_kn" id="content_kn" rows="15"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('content_kn') }}</textarea>
                    @error('content_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Title -->
                <div class="md:col-span-2">
                    <label for="meta_title" class="block text-white/70 mb-1 text-sm">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="SEO meta title">
                    @error('meta_title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Published -->
                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer mt-5">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                            class="w-4 h-4 rounded bg-white/10 border-white/20 text-primary focus:ring-primary focus:ring-offset-0">
                        <span class="text-white/70 text-sm">Published</span>
                    </label>
                </div>

                <!-- Meta Description -->
                <div class="md:col-span-3">
                    <label for="meta_description" class="block text-white/70 mb-1 text-sm">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="SEO meta description">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                    <i class="fas fa-save"></i>
                    <span>Create Blog Post</span>
                </button>
                <a href="{{ route('admin.blogs.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition-colors duration-300 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    let editorInstance, editorInstanceKn;
    
    // English Editor
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .then(editor => {
            editorInstance = editor;
            console.log('English CKEditor initialized');
        })
        .catch(error => {
            console.error('English CKEditor error:', error);
        });

    // Kannada Editor
    ClassicEditor
        .create(document.querySelector('#content_kn'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .then(editor => {
            editorInstanceKn = editor;
            console.log('Kannada CKEditor initialized');
        })
        .catch(error => {
            console.error('Kannada CKEditor error:', error);
        });

    // Handle form submission
    document.getElementById('blogForm').addEventListener('submit', function(e) {
        if (editorInstance) {
            const editorData = editorInstance.getData();
            document.querySelector('#content').value = editorData;
            
            const contentError = document.getElementById('content-error');
            if (!editorData || editorData.trim() === '' || editorData === '<p>&nbsp;</p>' || editorData === '<p></p>') {
                e.preventDefault();
                contentError.style.display = 'block';
                document.querySelector('.ck-editor').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return false;
            } else {
                contentError.style.display = 'none';
            }
        }
        
        if (editorInstanceKn) {
            const editorDataKn = editorInstanceKn.getData();
            document.querySelector('#content_kn').value = editorDataKn;
        }
    });

    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endpush
@endsection
