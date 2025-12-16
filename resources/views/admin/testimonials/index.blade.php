@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')
@section('page-title', 'Testimonials')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-white">All Testimonials</h2>
            <p class="text-white/60 mt-1">Manage user testimonials and approve them to show on the website</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white/10 rounded-xl p-4 border border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-check text-green-400"></i>
                </div>
                <div>
                    <p class="text-white/60 text-sm">Approved</p>
                    <p class="text-white text-xl font-bold">{{ $testimonials->where('is_approved', true)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white/10 rounded-xl p-4 border border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-yellow-500/20 flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-400"></i>
                </div>
                <div>
                    <p class="text-white/60 text-sm">Pending</p>
                    <p class="text-white text-xl font-bold">{{ $testimonials->where('is_approved', false)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white/10 rounded-xl p-4 border border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-comments text-blue-400"></i>
                </div>
                <div>
                    <p class="text-white/60 text-sm">Total</p>
                    <p class="text-white text-xl font-bold">{{ $testimonials->total() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Table -->
    <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Name</th>
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Occupation</th>
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Rating</th>
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Story</th>
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Status</th>
                        <th class="text-left py-4 px-6 text-white/70 font-medium text-sm">Date</th>
                        <th class="text-right py-4 px-6 text-white/70 font-medium text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                            <td class="py-4 px-6">
                                <span class="text-white font-medium">{{ $testimonial->name }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-white/70">{{ $testimonial->occupation ?? '-' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star text-sm"></i>
                                        @else
                                            <i class="far fa-star text-sm text-white/30"></i>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-white/70 text-sm line-clamp-2">{{ Str::limit($testimonial->story, 80) }}</span>
                            </td>
                            <td class="py-4 px-6">
                                @if($testimonial->is_approved)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                        <i class="fas fa-check-circle"></i> Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-white/60 text-sm">{{ $testimonial->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-end gap-2">
                                    @if(!$testimonial->is_approved)
                                        <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="p-2 text-green-400 hover:bg-green-500/20 rounded-lg transition-colors" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="p-2 text-yellow-400 hover:bg-yellow-500/20 rounded-lg transition-colors" title="Unapprove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                       class="p-2 text-blue-400 hover:bg-blue-500/20 rounded-lg transition-colors" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-colors" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center">
                                <div class="text-white/40">
                                    <i class="fas fa-comments text-4xl mb-3"></i>
                                    <p>No testimonials yet</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($testimonials->hasPages())
        <div class="flex justify-center">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
