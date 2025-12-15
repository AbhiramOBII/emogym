<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'max_participants',
        'current_participants',
        'is_available',
        'notes',
        'notes_kn',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_available' => 'boolean',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function registrations()
    {
        return $this->hasMany(ProgramRegistration::class);
    }

    public function paidRegistrations()
    {
        return $this->hasMany(ProgramRegistration::class)->where('payment_status', 'paid');
    }

    public function hasAvailableSlots()
    {
        if ($this->max_participants === null) {
            return true;
        }
        $paidCount = $this->paidRegistrations()->count();
        return $paidCount < $this->max_participants;
    }

    public function remainingSlots()
    {
        if ($this->max_participants === null) {
            return null;
        }
        // Count only paid registrations
        $paidCount = $this->paidRegistrations()->count();
        return max(0, $this->max_participants - $paidCount);
    }
}
