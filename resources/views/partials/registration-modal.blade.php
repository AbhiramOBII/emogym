<!-- Registration Modal -->
<div id="registrationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden items-center justify-center p-4" style="display: none !important; visibility: hidden !important;">
    <div class="bg-white rounded-2xl max-w-md w-full max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all">
        <div class="p-6">
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-charcoal">{{ __('registration.modal_title') }}</h3>
                <button onclick="closeRegistrationModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <!-- Program Info -->
            <div id="programInfo" class="bg-gradient-to-r from-primary/10 to-primary/5 rounded-lg p-4 mb-6 border border-primary/20">
                <h4 id="programTitle" class="font-semibold text-lg text-charcoal mb-3"></h4>
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ __('registration.program_date') }}:</span>
                        <span id="programDate" class="flex items-center gap-1 font-medium text-charcoal">
                            <i class="fas fa-calendar text-primary"></i>
                            <span></span>
                        </span>
                    </div>
                    <div id="pricingDetails" class="border-t border-gray-200 pt-2 mt-2">
                        <!-- Pricing will be inserted here -->
                    </div>
                    <div class="flex items-center justify-between text-base font-bold border-t border-primary/30 pt-2 mt-2">
                        <span class="text-charcoal">{{ __('registration.total_amount') }}:</span>
                        <span id="totalAmount" class="text-2xl text-primary"></span>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <form id="registrationForm" onsubmit="submitRegistration(event)">
                <input type="hidden" id="program_id" name="program_id">
                <input type="hidden" id="program_date_id" name="program_date_id">
                <input type="hidden" id="program_amount" name="amount">
                <input type="hidden" id="program_original_price" name="original_price">
                <input type="hidden" id="program_discount" name="discount">

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">{{ __('registration.full_name') }} <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="{{ __('registration.full_name_placeholder') }}">
                    <span class="text-red-500 text-sm hidden" id="name-error"></span>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('registration.email') }} <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="{{ __('registration.email_placeholder') }}">
                    <span class="text-red-500 text-sm hidden" id="email-error"></span>
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-medium mb-2">{{ __('registration.phone') }} <span class="text-red-500">*</span></label>
                    <input type="tel" id="phone" name="phone" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="{{ __('registration.phone_placeholder') }}">
                    <span class="text-red-500 text-sm hidden" id="phone-error"></span>
                </div>

                <!-- Message -->
                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-medium mb-2">{{ __('registration.message_optional') }}</label>
                    <textarea id="message" name="message" rows="3"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                        placeholder="{{ __('registration.message_placeholder') }}"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-3">
                    <button type="submit" id="submitBtn"
                        class="flex-1 bg-primary hover:bg-primary/90 text-white py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg flex items-center justify-center gap-2">
                        <span id="submitText">
                            <i class="fas fa-lock"></i> {{ __('registration.proceed_to_payment') }}
                        </span>
                        <span id="submitLoader" class="hidden">
                            <i class="fas fa-spinner fa-spin"></i> {{ __('registration.processing') }}
                        </span>
                    </button>
                    <button type="button" onclick="closeRegistrationModal()"
                        class="px-6 py-3 rounded-full border-2 border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition-all">
                        {{ __('registration.cancel') }}
                    </button>
                </div>
            </form>

            <!-- Success Message -->
            <div id="successMessage" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                    <div>
                        <h4 class="font-semibold text-green-800 mb-1">{{ __('registration.registration_successful') }}</h4>
                        <p class="text-green-700 text-sm">{{ __('registration.registration_success_message') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
let currentProgramData = {};

function openRegistrationModal(programId, programTitle, programPrice, programDate, programDateId = null, originalPrice = null, discount = null) {
    // Parse prices (remove ₹ and commas)
    const finalAmount = parseFloat(programPrice.replace(/[₹,]/g, ''));
    const originalAmount = originalPrice ? parseFloat(originalPrice.replace(/[₹,]/g, '')) : finalAmount;
    const discountAmount = originalAmount - finalAmount;
    
    currentProgramData = {
        id: programId,
        title: programTitle,
        price: finalAmount,
        originalPrice: originalAmount,
        discount: discountAmount,
        date: programDate,
        dateId: programDateId
    };

    // Set program info
    document.getElementById('programTitle').textContent = programTitle;
    document.getElementById('programDate').querySelector('span').textContent = programDate;
    document.getElementById('totalAmount').textContent = '₹' + finalAmount.toLocaleString('en-IN');
    
    // Build pricing details HTML
    let pricingHTML = '';
    if (discountAmount > 0) {
        pricingHTML = `
            <div class="space-y-1 text-sm">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">{{ __('registration.original_price') }}:</span>
                    <span class="text-gray-500 line-through">₹${originalAmount.toLocaleString('en-IN')}</span>
                </div>
                <div class="flex items-center justify-between text-green-600">
                    <span>{{ __('registration.discount') }}:</span>
                    <span>- ₹${discountAmount.toLocaleString('en-IN')}</span>
                </div>
            </div>
        `;
    } else {
        pricingHTML = `
            <div class="text-sm">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">{{ __('registration.program_fee') }}:</span>
                    <span class="text-charcoal font-medium">₹${finalAmount.toLocaleString('en-IN')}</span>
                </div>
            </div>
        `;
    }
    document.getElementById('pricingDetails').innerHTML = pricingHTML;
    
    // Set hidden fields
    document.getElementById('program_id').value = programId;
    document.getElementById('program_date_id').value = programDateId || '';
    document.getElementById('program_amount').value = finalAmount;
    document.getElementById('program_original_price').value = originalAmount;
    document.getElementById('program_discount').value = discountAmount;

    // Show modal
    const modal = document.getElementById('registrationModal');
    modal.style.display = '';
    modal.style.visibility = '';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeRegistrationModal() {
    const modal = document.getElementById('registrationModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    modal.style.display = 'none';
    modal.style.visibility = 'hidden';
    document.body.style.overflow = 'auto';
    
    // Reset form
    document.getElementById('registrationForm').reset();
    document.getElementById('successMessage').classList.add('hidden');
    document.querySelectorAll('[id$="-error"]').forEach(el => el.classList.add('hidden'));
}

async function submitRegistration(event) {
    event.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitLoader = document.getElementById('submitLoader');
    const form = document.getElementById('registrationForm');
    
    // Hide previous errors
    document.querySelectorAll('[id$="-error"]').forEach(el => el.classList.add('hidden'));
    
    // Validate form
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Show loader
    submitBtn.disabled = true;
    submitText.classList.add('hidden');
    submitLoader.classList.remove('hidden');
    
    try {
        // Create order on backend
        const formData = new FormData(form);
        const response = await fetch('{{ route("program.createOrder") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        });
        
        const data = await response.json();
        
        if (response.ok && data.order_id) {
            // Initialize Razorpay
            const options = {
                key: '{{ config("services.razorpay.key") }}',
                amount: data.amount,
                currency: 'INR',
                name: 'Emogym',
                description: currentProgramData.title,
                order_id: data.order_id,
                prefill: {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    contact: document.getElementById('phone').value
                },
                theme: {
                    color: '#FF4F73'
                },
                handler: async function (response) {
                    // Payment successful, verify and save registration
                    await verifyPayment(response, data.registration_id);
                },
                modal: {
                    ondismiss: function() {
                        // Re-enable button if payment modal is closed
                        submitBtn.disabled = false;
                        submitText.classList.remove('hidden');
                        submitLoader.classList.add('hidden');
                    }
                }
            };
            
            const rzp = new Razorpay(options);
            rzp.open();
        } else {
            // Show validation errors
            if (data.errors) {
                Object.keys(data.errors).forEach(key => {
                    const errorEl = document.getElementById(`${key}-error`);
                    if (errorEl) {
                        errorEl.textContent = data.errors[key][0];
                        errorEl.classList.remove('hidden');
                    }
                });
            } else {
                alert(data.message || @json(__('registration.an_error_occurred')));
            }
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoader.classList.add('hidden');
        }
    } catch (error) {
        console.error('Error:', error);
        alert(@json(__('registration.an_error_occurred')));
        submitBtn.disabled = false;
        submitText.classList.remove('hidden');
        submitLoader.classList.add('hidden');
    }
}

async function verifyPayment(paymentData, registrationId) {
    try {
        const response = await fetch('{{ route("program.verifyPayment") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                razorpay_payment_id: paymentData.razorpay_payment_id,
                razorpay_order_id: paymentData.razorpay_order_id,
                razorpay_signature: paymentData.razorpay_signature,
                registration_id: registrationId
            })
        });
        
        const data = await response.json();
        
        if (response.ok && data.success) {
            // Show success message
            document.getElementById('registrationForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
            
            // Close modal after 3 seconds
            setTimeout(() => {
                closeRegistrationModal();
                document.getElementById('registrationForm').classList.remove('hidden');
            }, 3000);
        } else {
            alert(@json(__('registration.payment_verification_failed')));
        }
    } catch (error) {
        console.error('Error:', error);
        alert(@json(__('registration.payment_verification_failed')));
    }
}

// Close modal on outside click
document.getElementById('registrationModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeRegistrationModal();
    }
});
</script>
