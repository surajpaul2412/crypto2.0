<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeritagePerformance extends Model
{
    protected $fillable = [
        'category_id',
        'youtube_url',
        'youtube_id',
        'title',
        'subtitle',
        'lightbox_title',
        'sort_order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HeritageCategory::class, 'category_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function thumbnailUrl(): string
    {
        return "https://i.ytimg.com/vi/{$this->youtube_id}/maxresdefault.jpg";
    }

    public function displayLightboxTitle(): string
    {
        return $this->lightbox_title ?: $this->title;
    }

    /**
     * Extract the 11-char YouTube video ID from any common URL shape
     * (watch?v=, youtu.be/, embed/, shorts/). Returns null if not found.
     */
    public static function extractYoutubeId(string $url): ?string
    {
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
