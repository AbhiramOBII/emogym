<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'title_kn',
        'description',
        'description_kn',
        'type',
        'file_path',
        'video_url',
        'thumbnail',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get only active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only images
     */
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    /**
     * Scope to get only videos
     */
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    /**
     * Get ordered items
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Get YouTube video ID from URL
     */
    public function getYoutubeIdAttribute()
    {
        if ($this->type !== 'video' || !$this->video_url) {
            return null;
        }

        // Extract YouTube ID from various URL formats
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $this->video_url, $matches);
        
        return $matches[1] ?? null;
    }

    /**
     * Get embed URL for video
     */
    public function getEmbedUrlAttribute()
    {
        if ($this->type !== 'video' || !$this->video_url) {
            return null;
        }

        // YouTube
        if (strpos($this->video_url, 'youtube.com') !== false || strpos($this->video_url, 'youtu.be') !== false) {
            $youtubeId = $this->youtube_id;
            return $youtubeId ? "https://www.youtube.com/embed/{$youtubeId}" : null;
        }

        // Vimeo
        if (strpos($this->video_url, 'vimeo.com') !== false) {
            preg_match('/vimeo\.com\/(\d+)/', $this->video_url, $matches);
            $vimeoId = $matches[1] ?? null;
            return $vimeoId ? "https://player.vimeo.com/video/{$vimeoId}" : null;
        }

        return null;
    }
}
