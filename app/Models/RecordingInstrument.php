<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecordingInstrument extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'subtitle',
        'image_path',
        'detail_slug',
        'sort_order',
        'is_published',
        'subhead_accent',
        'subhead_body',
        'tagline',
        'meta_description',
        'brings',
        'anatomy_image_path',
        'anatomy_photo_aspect',
        'sonic_range_start_pct',
        'sonic_range_end_pct',
        'sonic_sweet_pct',
        'sonic_sweet_label',
        'sonic_range_caption',
        'sonic_dynamic_range_value',
        'sonic_dynamic_range_detail',
        'sonic_stereo_value',
        'sonic_stereo_detail',
        'sonic_mic_value',
        'sonic_mic_detail',
        'icon_svg',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'brings' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(InstrumentCategory::class, 'category_id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(RecordingInstrumentVideo::class)->orderBy('sort_order');
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(RecordingInstrumentTrack::class)->orderBy('sort_order');
    }

    public function anatomyParts(): HasMany
    {
        return $this->hasMany(RecordingInstrumentAnatomyPart::class)->orderBy('sort_order');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(RecordingInstrumentVariant::class)->orderBy('sort_order');
    }

    public function pairs(): HasMany
    {
        return $this->hasMany(RecordingInstrumentPair::class)->orderBy('sort_order');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(RecordingInstrumentFaq::class)->orderBy('sort_order');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function imageUrl(): string
    {
        return asset($this->image_path);
    }

    public function detailUrl(): ?string
    {
        return $this->detail_slug ? url('/' . app()->getLocale() . '/recording/' . $this->detail_slug) : null;
    }

    public function anatomyImageUrl(): ?string
    {
        return $this->anatomy_image_path ? asset($this->anatomy_image_path) : null;
    }

    /**
     * Small badge shown wherever this instrument is referenced as a "pair"
     * on another instrument's page. Falls back to an auto-generated initial
     * when no custom icon has been set — mirrors SuccessStory::monogram().
     */
    public function iconSvgOrMonogram(): string
    {
        return $this->icon_svg ?: mb_strtoupper(mb_substr($this->name, 0, 1));
    }

    public function hasCustomIcon(): bool
    {
        return filled($this->icon_svg);
    }
}
