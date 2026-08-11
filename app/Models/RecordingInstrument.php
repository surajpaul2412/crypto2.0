<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(InstrumentCategory::class, 'category_id');
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
        return $this->detail_slug ? url('/recording/' . $this->detail_slug) : null;
    }
}
