<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'program_date_id',
        'name',
        'email',
        'phone',
        'message',
        'amount',
        'original_price',
        'discount',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'payment_status',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the program that this registration belongs to
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the program date that this registration is for
     */
    public function programDate()
    {
        return $this->belongsTo(ProgramDate::class);
    }
}
