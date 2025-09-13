<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the YouTube video ID from the URL
     */
    public function getYoutubeIdAttribute()
    {
        $url = $this->youtube_url;
        
        // Handle different YouTube URL formats
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches)) {
            return $matches[1];
        }
        
        return null;
    }

    /**
     * Get the embed URL for the YouTube video
     */
    public function getEmbedUrlAttribute()
    {
        $videoId = $this->youtube_id;
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }
}
