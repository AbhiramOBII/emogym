@extends('admin.layouts.app')

@section('page-title', 'Blogs')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 text-sm">
        <i class="fas fa-plus"></i>
        <span>New Blog Post</span>
    </a>
</div>

<div class="rounded-lg overflow-hidden shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-white/5">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Image</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Title</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Author</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Published</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-white/70 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($blogs as $blog)
                    <tr class="hover:bg-white/5 transition-colors duration-200">
                        <td class="px-4 py-3">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-white/30"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="text-white font-medium">{{ $blog->title }}</div>
                            <div class="text-white/50 text-sm">{{ Str::limit($blog->excerpt, 60) }}</div>
                        </td>
                        <td class="px-4 py-3 text-white/70 text-sm">{{ $blog->author ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            @if($blog->is_published)
                                <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Published</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Draft</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-white/70 text-sm">
                            {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors duration-200" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-white/50">
                            No blog posts found. <a href="{{ route('admin.blogs.create') }}" class="text-primary hover:underline">Create your first blog post</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
        <div class="px-4 py-3 border-t border-white/10">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
