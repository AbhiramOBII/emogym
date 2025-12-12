@extends('admin.layouts.app')

@section('page-title', 'Edit Blog Post')

@section('content')
<div class="max-w-6xl">
    <div class="mb-4">
        <a href="{{ route('admin.blogs.index') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Blogs</span>
        </a>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <h2 class="text-xl font-bold text-white mb-4">Edit Blog Post</h2>

        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Title -->
                <div class="md:col-span-3">
                    <label for="title" class="block text-white/70 mb-1 text-sm">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="md:col-span-2">
                    <label for="slug" class="block text-white/70 mb-1 text-sm">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('slug')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-white/70 mb-1 text-sm">Author</label>
                    <input type="text" name="author" id="author" value="{{ old('author', $blog->author) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('author')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image & Upload -->
                <div class="md:col-span-3">
                    @if($blog->image)
                        <label class="block text-white/70 mb-1 text-sm">Current Image</label>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                    @endif
                    <label for="image" class="block text-white/70 mb-1 text-sm">{{ $blog->image ? 'Change Image' : 'Featured Image' }}</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white file:text-xs hover:file:bg-primary/90 transition-all duration-200">
                    @error('image')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div class="md:col-span-3">
                    <label for="excerpt" class="block text-white/70 mb-1 text-sm">Excerpt <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-3">
                    <label for="content" class="block text-white/70 mb-1 text-sm">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="15"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p id="content-error" class="text-red-400 text-xs mt-1" style="display: none;">Content is required</p>
                </div>

                <!-- Meta Title -->
                <div class="md:col-span-2">
                    <label for="meta_title" class="block text-white/70 mb-1 text-sm">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $blog->meta_title) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('meta_title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Published -->
                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer mt-5">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                            class="w-4 h-4 rounded bg-white/10 border-white/20 text-primary focus:ring-primary focus:ring-offset-0">
                        <span class="text-white/70 text-sm">Published</span>
                    </label>
                </div>

                <!-- Meta Description -->
                <div class="md:col-span-3">
                    <label for="meta_description" class="block text-white/70 mb-1 text-sm">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    @error('meta_description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                    <i class="fas fa-save"></i>
                    <span>Update Blog Post</span>
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
    let editorInstance;
    
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
            console.log('CKEditor initialized successfully');
        })
        .catch(error => {
            console.error('CKEditor initialization error:', error);
        });

    // Handle form submission
    document.getElementById('blogForm').addEventListener('submit', function(e) {
        if (editorInstance) {
            // Update the textarea with CKEditor content
            const editorData = editorInstance.getData();
            document.querySelector('#content').value = editorData;
            
            // Validate content is not empty
            const contentError = document.getElementById('content-error');
            if (!editorData || editorData.trim() === '' || editorData === '<p>&nbsp;</p>' || editorData === '<p></p>') {
                e.preventDefault();
                contentError.style.display = 'block';
                // Scroll to the editor
                document.querySelector('.ck-editor').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return false;
            } else {
                contentError.style.display = 'none';
            }
            
            console.log('Form submitting with content length:', editorData.length);
        }
    });
</script>
@endpush
@endsection
