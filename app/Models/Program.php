<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_kn',
        'slug',
        'image',
        'description',
        'description_kn',
        'short_description',
        'short_description_kn',
        'who_is_this_for',
        'who_is_this_for_kn',
        'meta_title',
        'meta_description',
        'type',
        'link',
        'address',
        'cost',
        'original_price',
        'discount_percentage',
        'discount_amount',
        'is_active',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'original_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('title') && empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    public function dates()
    {
        return $this->hasMany(ProgramDate::class);
    }

    public function availableDates()
    {
        return $this->hasMany(ProgramDate::class)->where('is_available', true);
    }
}
