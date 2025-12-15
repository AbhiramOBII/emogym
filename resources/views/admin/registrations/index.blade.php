@extends('admin.layouts.app')

@section('page-title', 'Program Registrations')

@section('content')
<div class="max-w-7xl">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">Program Registrations</h2>
        <div class="text-white/70">
            <i class="fas fa-users"></i>
            Total: {{ $registrations->total() }} registrations
        </div>
    </div>

    @if($registrations->isEmpty())
        <div class="text-center py-16 rounded-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
            <i class="fas fa-clipboard-list text-white/20 text-6xl mb-4"></i>
            <p class="text-white/70 text-lg">No registrations yet.</p>
        </div>
    @else
        <div class="overflow-x-auto rounded-lg shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Program</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Payment</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Registered</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-white/70 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($registrations as $registration)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-4 py-4 text-sm text-white">#{{ $registration->id }}</td>
                            <td class="px-4 py-4">
                                <div class="text-sm font-medium text-white">{{ $registration->name }}</div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-white/70">
                                    <div class="flex items-center gap-2 mb-1">
                                        <i class="fas fa-envelope text-xs"></i>
                                        <a href="mailto:{{ $registration->email }}" class="hover:text-primary">{{ $registration->email }}</a>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-phone text-xs"></i>
                                        <a href="tel:{{ $registration->phone }}" class="hover:text-primary">{{ $registration->phone }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-white">{{ $registration->program->title }}</div>
                                @if($registration->message)
                                    <div class="text-xs text-white/50 mt-1 max-w-xs truncate" title="{{ $registration->message }}">
                                        <i class="fas fa-comment"></i> {{ $registration->message }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-sm text-white/70">
                                @if($registration->programDate)
                                    {{ $registration->programDate->start_date->format('M d, Y') }}
                                @else
                                    <span class="text-white/40">Not specified</span>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-white">₹{{ number_format($registration->amount, 2) }}</div>
                                @if($registration->discount > 0)
                                    <div class="text-xs text-green-400">-₹{{ number_format($registration->discount, 2) }} off</div>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $registration->payment_status === 'paid' ? 'bg-green-500/20 text-green-300' : '' }}
                                    {{ $registration->payment_status === 'pending' ? 'bg-yellow-500/20 text-yellow-300' : '' }}
                                    {{ $registration->payment_status === 'failed' ? 'bg-red-500/20 text-red-300' : '' }}">
                                    {{ ucfirst($registration->payment_status) }}
                                </span>
                                @if($registration->razorpay_payment_id)
                                    <div class="text-xs text-white/40 mt-1">{{ substr($registration->razorpay_payment_id, 0, 20) }}...</div>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                <form action="{{ route('admin.registrations.updateStatus', $registration) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" 
                                        class="text-xs px-2 py-1 rounded-full border-0 focus:ring-2 focus:ring-primary/50
                                        {{ $registration->status === 'confirmed' ? 'bg-green-500/20 text-green-300' : '' }}
                                        {{ $registration->status === 'pending' ? 'bg-yellow-500/20 text-yellow-300' : '' }}
                                        {{ $registration->status === 'cancelled' ? 'bg-red-500/20 text-red-300' : '' }}">
                                        <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $registration->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-4 text-sm text-white/70">
                                {{ $registration->created_at->format('M d, Y') }}
                                <div class="text-xs text-white/40">{{ $registration->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-4 py-4">
                                <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" 
                                    onsubmit="return confirm('Are you sure you want to delete this registration?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $registrations->links() }}
        </div>
    @endif
</div>
@endsection
