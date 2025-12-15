<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('program_registrations', function (Blueprint $table) {
            $table->decimal('amount', 10, 2)->default(0)->after('message');
            $table->decimal('original_price', 10, 2)->nullable()->after('amount');
            $table->decimal('discount', 10, 2)->nullable()->after('original_price');
            $table->string('razorpay_order_id')->nullable()->after('discount');
            $table->string('razorpay_payment_id')->nullable()->after('razorpay_order_id');
            $table->string('razorpay_signature')->nullable()->after('razorpay_payment_id');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->after('razorpay_signature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_registrations', function (Blueprint $table) {
            $table->dropColumn(['amount', 'original_price', 'discount', 'razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature', 'payment_status']);
        });
    }
};
