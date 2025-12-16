@extends('admin.layouts.app')

@section('page-title', 'Edit Program')

@section('content')
<div class="max-w-6xl">
    <div class="mb-4">
        <a href="{{ route('admin.programs.index') }}" class="text-primary hover:text-primary/80 transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Programs</span>
        </a>
    </div>

    <div class="rounded-lg p-6 shadow-lg" style="background: linear-gradient(155deg, rgba(38, 38, 38, 1) 38%, rgba(42, 42, 42, 1) 100%);">
        <h2 class="text-xl font-bold text-white mb-4">Edit Program</h2>

        <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Title (English) -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-white/70 mb-1 text-sm">Title (English) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $program->title) }}" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title (Kannada) -->
                <div>
                    <label for="title_kn" class="block text-white/70 mb-1 text-sm">Title (ಕನ್ನಡ)</label>
                    <input type="text" name="title_kn" id="title_kn" value="{{ old('title_kn', $program->title_kn) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('title_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-white/70 mb-1 text-sm">Type <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                        <option value="offline" {{ old('type', $program->type) === 'offline' ? 'selected' : '' }}>Offline</option>
                        <option value="online" {{ old('type', $program->type) === 'online' ? 'selected' : '' }}>Online</option>
                    </select>
                    @error('type')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Program Type (Current/Upcoming) -->
                <div>
                    <label for="program_type" class="block text-white/70 mb-1 text-sm">Program Type <span class="text-red-500">*</span></label>
                    <select name="program_type" id="program_type" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                        <option value="current" {{ old('program_type', $program->program_type ?? 'current') === 'current' ? 'selected' : '' }}>Current</option>
                        <option value="upcoming" {{ old('program_type', $program->program_type) === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    </select>
                    @error('program_type')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Original Price -->
                <div>
                    <label for="original_price" class="block text-white/70 mb-1 text-sm">Original Price (₹) <span class="text-red-500">*</span></label>
                    <input type="number" name="original_price" id="original_price" value="{{ old('original_price', $program->original_price ?? $program->cost) }}" step="0.01" min="0" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="0.00">
                    @error('original_price')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Discount Percentage -->
                <div>
                    <label for="discount_percentage" class="block text-white/70 mb-1 text-sm">Discount (%)</label>
                    <input type="number" name="discount_percentage" id="discount_percentage" value="{{ old('discount_percentage', $program->discount_percentage ?? '') }}" step="0.01" min="0" max="100"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="0.00">
                    @error('discount_percentage')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Discount Amount -->
                <div>
                    <label for="discount_amount" class="block text-white/70 mb-1 text-sm">Discount Amount (₹)</label>
                    <input type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', $program->discount_amount ?? '') }}" step="0.01" min="0"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200"
                        placeholder="0.00">
                    @error('discount_amount')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Final Cost (Read-only) -->
                <div>
                    <label for="cost" class="block text-white/70 mb-1 text-sm">Final Cost (₹) <span class="text-red-500">*</span></label>
                    <input type="number" name="cost" id="cost" value="{{ old('cost', $program->cost ?? 0) }}" step="0.01" min="0" required readonly
                        class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/20 text-white text-sm cursor-not-allowed"
                        placeholder="0.00">
                    @error('cost')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image & Upload -->
                <div>
                    @if($program->image)
                        <label class="block text-white/70 mb-1 text-sm">Current Image</label>
                        <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-20 h-20 object-cover rounded-lg mb-2">
                    @endif
                    <label for="image" class="block text-white/70 mb-1 text-sm">{{ $program->image ? 'Change' : 'Image' }}</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white file:text-xs hover:file:bg-primary/90 transition-all duration-200">
                    @error('image')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Description (English) -->
                <div class="md:col-span-3">
                    <label for="short_description" class="block text-white/70 mb-1 text-sm">Short Description (English) <span class="text-red-500">*</span></label>
                    <textarea name="short_description" id="short_description" rows="2" required
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('short_description', $program->short_description) }}</textarea>
                    @error('short_description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Description (Kannada) -->
                <div class="md:col-span-3">
                    <label for="short_description_kn" class="block text-white/70 mb-1 text-sm">Short Description (ಕನ್ನಡ)</label>
                    <textarea name="short_description_kn" id="short_description_kn" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('short_description_kn', $program->short_description_kn) }}</textarea>
                    @error('short_description_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description (English) -->
                <div class="md:col-span-3">
                    <label for="description" class="block text-white/70 mb-1 text-sm">Description (English) <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="6" data-required="true"
                        class="ckeditor-field w-full">{{ old('description', $program->description) }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description (Kannada) -->
                <div class="md:col-span-3">
                    <label for="description_kn" class="block text-white/70 mb-1 text-sm">Description (ಕನ್ನಡ)</label>
                    <textarea name="description_kn" id="description_kn" rows="6"
                        class="ckeditor-field w-full">{{ old('description_kn', $program->description_kn) }}</textarea>
                    @error('description_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Who is this for (English) -->
                <div class="md:col-span-3">
                    <label for="who_is_this_for" class="block text-white/70 mb-1 text-sm">Who is this for? (English)</label>
                    <textarea name="who_is_this_for" id="who_is_this_for" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('who_is_this_for', $program->who_is_this_for) }}</textarea>
                    @error('who_is_this_for')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Who is this for (Kannada) -->
                <div class="md:col-span-3">
                    <label for="who_is_this_for_kn" class="block text-white/70 mb-1 text-sm">Who is this for? (ಕನ್ನಡ)</label>
                    <textarea name="who_is_this_for_kn" id="who_is_this_for_kn" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('who_is_this_for_kn', $program->who_is_this_for_kn) }}</textarea>
                    @error('who_is_this_for_kn')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Link (for online) -->
                <div id="link-field" class="md:col-span-3" style="display: {{ old('type', $program->type) === 'online' ? 'block' : 'none' }};">
                    <label for="link" class="block text-white/70 mb-1 text-sm">Online Link <span class="text-red-500">*</span></label>
                    <input type="url" name="link" id="link" value="{{ old('link', $program->link) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('link')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address (for offline) -->
                <div id="address-field" class="md:col-span-3" style="display: {{ old('type', $program->type) === 'offline' ? 'block' : 'none' }};">
                    <label for="address" class="block text-white/70 mb-1 text-sm">Address <span class="text-red-500">*</span></label>
                    <textarea name="address" id="address" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('address', $program->address) }}</textarea>
                    @error('address')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Title -->
                <div class="md:col-span-2">
                    <label for="meta_title" class="block text-white/70 mb-1 text-sm">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $program->meta_title) }}"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">
                    @error('meta_title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Active -->
                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer mt-5">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active) ? 'checked' : '' }}
                            class="w-4 h-4 rounded bg-white/10 border-white/20 text-primary focus:ring-primary focus:ring-offset-0">
                        <span class="text-white/70 text-sm">Active</span>
                    </label>
                </div>

                <!-- Meta Description -->
                <div class="md:col-span-3">
                    <label for="meta_description" class="block text-white/70 mb-1 text-sm">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                        class="w-full px-3 py-2 rounded-lg bg-white/10 border border-white/20 text-white text-sm focus:border-primary focus:ring-1 focus:ring-primary/50 transition-all duration-200">{{ old('meta_description', $program->meta_description) }}</textarea>
                    @error('meta_description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2 shadow-lg text-sm">
                    <i class="fas fa-save"></i>
                    <span>Update Program</span>
                </button>
                <a href="{{ route('admin.programs.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2 rounded-lg transition-colors duration-300 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Type toggle
    document.getElementById('type').addEventListener('change', function() {
        const linkField = document.getElementById('link-field');
        const addressField = document.getElementById('address-field');
        
        if (this.value === 'online') {
            linkField.style.display = 'block';
            addressField.style.display = 'none';
            document.getElementById('link').required = true;
            document.getElementById('address').required = false;
        } else {
            linkField.style.display = 'none';
            addressField.style.display = 'block';
            document.getElementById('link').required = false;
            document.getElementById('address').required = true;
        }
    });

    // Pricing calculations
    const originalPriceInput = document.getElementById('original_price');
    const discountPercentageInput = document.getElementById('discount_percentage');
    const discountAmountInput = document.getElementById('discount_amount');
    const finalCostInput = document.getElementById('cost');

    function calculateFinalCost() {
        const originalPrice = parseFloat(originalPriceInput.value) || 0;
        const discountPercentage = parseFloat(discountPercentageInput.value) || 0;
        const discountAmount = parseFloat(discountAmountInput.value) || 0;

        let finalCost = originalPrice;

        if (discountPercentage > 0) {
            finalCost = originalPrice - (originalPrice * discountPercentage / 100);
        } else if (discountAmount > 0) {
            finalCost = originalPrice - discountAmount;
        }

        finalCost = Math.max(0, finalCost); // Ensure non-negative
        finalCostInput.value = finalCost.toFixed(2);
    }

    // When discount percentage changes
    discountPercentageInput.addEventListener('input', function() {
        if (this.value) {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const discountPercentage = parseFloat(this.value) || 0;
            const calculatedDiscountAmount = (originalPrice * discountPercentage / 100);
            
            // Update discount amount field
            discountAmountInput.value = calculatedDiscountAmount.toFixed(2);
        } else {
            discountAmountInput.value = '';
        }
        calculateFinalCost();
    });

    // When discount amount changes
    discountAmountInput.addEventListener('input', function() {
        if (this.value) {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const discountAmount = parseFloat(this.value) || 0;
            const calculatedPercentage = originalPrice > 0 ? (discountAmount / originalPrice * 100) : 0;
            
            // Update discount percentage field
            discountPercentageInput.value = calculatedPercentage.toFixed(2);
        } else {
            discountPercentageInput.value = '';
        }
        calculateFinalCost();
    });

    // When original price changes
    originalPriceInput.addEventListener('input', function() {
        // Recalculate based on current discount percentage if set
        if (discountPercentageInput.value) {
            const discountPercentage = parseFloat(discountPercentageInput.value) || 0;
            const originalPrice = parseFloat(this.value) || 0;
            const calculatedDiscountAmount = (originalPrice * discountPercentage / 100);
            discountAmountInput.value = calculatedDiscountAmount.toFixed(2);
        } else if (discountAmountInput.value) {
            // Recalculate percentage based on current discount amount
            const discountAmount = parseFloat(discountAmountInput.value) || 0;
            const originalPrice = parseFloat(this.value) || 0;
            const calculatedPercentage = originalPrice > 0 ? (discountAmount / originalPrice * 100) : 0;
            discountPercentageInput.value = calculatedPercentage.toFixed(2);
        }
        calculateFinalCost();
    });

    // Initial calculation
    calculateFinalCost();

    // CKEditor initialization
    document.querySelectorAll('.ckeditor-field').forEach(textarea => {
        ClassicEditor
            .create(textarea, {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
            })
            .then(editor => {
                // Remove required attribute from hidden textarea to prevent validation error
                textarea.removeAttribute('required');
                
                // Add custom validation on form submit
                const form = textarea.closest('form');
                form.addEventListener('submit', function(e) {
                    const data = editor.getData();
                    if (textarea.hasAttribute('data-required') && !data.trim()) {
                        e.preventDefault();
                        alert('Please fill in the ' + textarea.previousElementSibling.textContent.replace('*', '').trim());
                        editor.focus();
                        return false;
                    }
                    // Update textarea value before submit
                    textarea.value = data;
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush
@endsection
