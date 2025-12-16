<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'occupation',
        'rating',
        'story',
        'is_approved',
        'order',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'rating' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Scope for approved testimonials
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope for pending testimonials
     */
    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    /**
     * Scope for ordered testimonials
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }
}
