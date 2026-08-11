<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'family_id',
        'region_id',
        'slug',
        'name',
        'tagline',
        'family_label_override',
        'region_label_override',
        'image_path',
        'price',
        'format',
        'artist',
        'flagship',
        'sort_order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'flagship' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(ProductFamily::class, 'family_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(ProductRegion::class, 'region_id');
    }

    public function moods(): BelongsToMany
    {
        return $this->belongsToMany(ProductMood::class, 'product_mood');
    }

    public function usecases(): BelongsToMany
    {
        return $this->belongsToMany(ProductUsecase::class, 'product_usecase');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function imageUrl(): string
    {
        return asset($this->image_path);
    }

    public function priceDisplay(): string
    {
        return $this->price <= 0 ? 'FREE' : '$' . number_format($this->price);
    }

    public function familyLabelDisplay(): string
    {
        return $this->family_label_override ?: $this->family->label;
    }

    public function regionLabelDisplay(): string
    {
        return $this->region_label_override ?: $this->region->label;
    }

    /**
     * Human-readable label for the `format` column, e.g. "kontakt" -> "Kontakt",
     * "wav-loops" -> "Wav Loops". Keeps the shop grid/detail pages readable for
     * any future format value without needing a hardcoded label per format.
     */
    public function formatLabel(): string
    {
        return collect(explode('-', $this->format))
            ->map(fn (string $word) => ucfirst($word))
            ->implode(' ');
    }

    public function isKontaktFormat(): bool
    {
        return str_starts_with($this->format, 'kontakt');
    }

    /**
     * Shape expected by the shop grid's client-side renderer (cardHTML/filter
     * logic in shop-page-scripts.blade.php) — keep in sync with that file.
     */
    public function toCatalogueArray(): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'tagline' => $this->tagline,
            'family' => $this->family->slug,
            'region' => $this->region->slug,
            'moods' => $this->moods->pluck('slug')->values()->all(),
            'usecases' => $this->usecases->pluck('slug')->values()->all(),
            'tags' => $this->tags->pluck('slug')->values()->all(),
            'format' => $this->format,
            'flagship' => $this->flagship,
            'price' => $this->price,
            'priceDisplay' => $this->priceDisplay(),
            'artist' => $this->artist,
            'familyLabel' => $this->familyLabelDisplay(),
            'regionLabel' => $this->regionLabelDisplay(),
            'image' => $this->imageUrl(),
        ];
    }
}
