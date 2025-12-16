<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_kn',
        'description',
        'description_kn',
        'image',
        'program_id',
        'button_text',
        'button_text_kn',
        'button_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the program associated with the banner.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Scope to get only active banners
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get ordered banners
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Get the button URL - either custom URL or program URL
     */
    public function getButtonLinkAttribute()
    {
        if ($this->button_url) {
            return $this->button_url;
        }
        
        if ($this->program_id && $this->program) {
            return route('programs.show', $this->program->slug);
        }
        
        return '#';
    }
}
