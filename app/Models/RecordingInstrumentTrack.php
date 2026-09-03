<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordingInstrumentTrack extends Model
{
    protected $fillable = [
        'recording_instrument_id',
        'type',
        'art_id',
        'tag_label',
        'title',
        'description',
        'audio_path',
        'peaks_path',
        'sort_order',
    ];

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'recording_instrument_id');
    }

    public function scopeDemos(Builder $query): Builder
    {
        return $query->where('type', 'demo');
    }

    public function scopeArticulations(Builder $query): Builder
    {
        return $query->where('type', 'articulation');
    }

    public function audioUrl(): ?string
    {
        return $this->audio_path ? asset($this->audio_path) : null;
    }

    public function peaksUrl(): ?string
    {
        return $this->peaks_path ? asset($this->peaks_path) : null;
    }
}
