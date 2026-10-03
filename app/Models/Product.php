<?php

namespace App\Models;

use App\Support\Money;
use App\Support\RegionPricing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'tagline', 'family_label_override', 'region_label_override'];

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
        'price_inr',
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

    public function tracks(): HasMany
    {
        return $this->hasMany(ProductTrack::class)->orderBy('sort_order');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function imageUrl(): string
    {
        return asset($this->image_path);
    }

    /**
     * Regional pricing: USD by default, INR for India — but only once an
     * admin has set `price_inr` on this product. Until then, India also
     * sees USD (no silent currency conversion). Free products stay "FREE"
     * regardless of region.
     */
    public function resolvedCurrencyCode(): string
    {
        if ($this->price <= 0) {
            return 'USD';
        }

        $pricing = app(RegionPricing::class);

        return ($pricing->isIndia() && $this->price_inr !== null) ? 'INR' : 'USD';
    }

    public function resolvedPrice(): float
    {
        if ($this->price <= 0) {
            return 0.0;
        }

        return $this->resolvedCurrencyCode() === 'INR'
            ? (float) $this->price_inr
            : (float) $this->price;
    }

    public function priceDisplay(): string
    {
        if ($this->price <= 0) {
            return 'FREE';
        }

        return Money::format($this->resolvedPrice(), $this->resolvedCurrencyCode(), 0);
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

    /**
     * Exact-match whitelist (not a prefix check) — a format like "kontakt2"
     * is a distinct format, not a Kontakt variant, even though the name
     * looks similar. Add to this list only for genuine Kontakt sub-formats.
     */
    public function isKontaktFormat(): bool
    {
        return in_array($this->format, ['kontakt', 'kontakt-player'], true);
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
            'price' => $this->resolvedPrice(),
            'priceDisplay' => $this->priceDisplay(),
            'currency' => $this->resolvedCurrencyCode(),
            'artist' => $this->artist,
            'familyLabel' => $this->familyLabelDisplay(),
            'regionLabel' => $this->regionLabelDisplay(),
            'image' => $this->imageUrl(),
        ];
    }
}
