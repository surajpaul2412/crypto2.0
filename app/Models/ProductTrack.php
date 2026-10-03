<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\URL;

class ProductTrack extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'audio_path',
        'mime_type',
        'preview_seconds',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'preview_seconds' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted(): void
    {
        // Admins just pick a WAV/MP3 file — the mime type that decides how
        // the preview route clips it is inferred from the extension, not a
        // separate field they'd have to fill in by hand.
        static::saving(function (self $track) {
            if ($track->audio_path && ! $track->mime_type) {
                $track->mime_type = str_ends_with(strtolower($track->audio_path), '.wav')
                    ? 'audio/wav'
                    : 'audio/mpeg';
            }
        });
    }

    /**
     * A signed, time-limited URL to the clipped preview. Not a permanent
     * link — it stops working after the TTL, so it can't be bookmarked,
     * shared, or scraped for later/offline use. Generate it fresh on every
     * page render (don't cache/store it).
     */
    public function previewUrl(int $ttlMinutes = 30): string
    {
        return URL::temporarySignedRoute(
            'product-tracks.preview',
            now()->addMinutes($ttlMinutes),
            ['track' => $this->id]
        );
    }
}
