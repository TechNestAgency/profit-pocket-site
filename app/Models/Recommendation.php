<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_image',
        'images',
        'is_active',
        'published_at'
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
}
