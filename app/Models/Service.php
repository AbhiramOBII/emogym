<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'title_kn',
        'description',
        'description_kn',
        'thumbnail',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope for active services
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered services
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
