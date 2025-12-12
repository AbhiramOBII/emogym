<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramRegistration;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class ProgramRegistrationController extends Controller
{
    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'program_date_id' => 'nullable|exists:program_dates,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        try {
            // Create registration record with pending payment
            $registration = ProgramRegistration::create([
                'program_id' => $validated['program_id'],
                'program_date_id' => $validated['program_date_id'] ?? null,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'] ?? null,
                'amount' => $validated['amount'],
                'original_price' => $validated['original_price'] ?? $validated['amount'],
                'discount' => $validated['discount'] ?? 0,
                'status' => 'pending',
                'payment_status' => 'pending',
            ]);

            // Get Razorpay credentials
            $razorpayKey = config('services.razorpay.key');
            $razorpaySecret = config('services.razorpay.secret');

            // Validate credentials exist
            if (empty($razorpayKey) || empty($razorpaySecret)) {
                throw new \Exception('Razorpay credentials not configured. Please add RAZORPAY_KEY and RAZORPAY_SECRET to .env file');
            }

            // Initialize Razorpay API
            $api = new Api($razorpayKey, $razorpaySecret);

            // Create Razorpay order
            $orderData = [
                'receipt' => 'reg_' . $registration->id,
                'amount' => $validated['amount'] * 100, // Amount in paise
                'currency' => 'INR',
                'notes' => [
                    'registration_id' => $registration->id,
                    'program_id' => $validated['program_id'],
                ]
            ];

            $razorpayOrder = $api->order->create($orderData);

            // Update registration with order ID
            $registration->update([
                'razorpay_order_id' => $razorpayOrder['id']
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'registration_id' => $registration->id,
            ]);

        } catch (\Razorpay\Api\Errors\Error $e) {
            // Razorpay specific error
            \Log::error('Razorpay Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Payment gateway error. Please check your Razorpay credentials.',
                'error' => $e->getMessage(),
                'debug' => [
                    'key_exists' => !empty(config('services.razorpay.key')),
                    'secret_exists' => !empty(config('services.razorpay.secret')),
                ]
            ], 500);
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $validated = $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'registration_id' => 'required|exists:program_registrations,id',
        ]);

        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            // Verify signature
            $attributes = [
                'razorpay_order_id' => $validated['razorpay_order_id'],
                'razorpay_payment_id' => $validated['razorpay_payment_id'],
                'razorpay_signature' => $validated['razorpay_signature']
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Update registration
            $registration = ProgramRegistration::findOrFail($validated['registration_id']);
            $registration->update([
                'razorpay_payment_id' => $validated['razorpay_payment_id'],
                'razorpay_signature' => $validated['razorpay_signature'],
                'payment_status' => 'paid',
                'status' => 'confirmed',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully!',
            ]);

        } catch (\Exception $e) {
            // Payment verification failed
            $registration = ProgramRegistration::find($validated['registration_id']);
            if ($registration) {
                $registration->update(['payment_status' => 'failed']);
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed.',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
