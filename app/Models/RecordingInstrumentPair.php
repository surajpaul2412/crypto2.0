<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordingInstrumentPair extends Model
{
    protected $fillable = [
        'recording_instrument_id',
        'paired_instrument_id',
        'relationship_label',
        'description',
        'why_bullets',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'why_bullets' => 'array',
        ];
    }

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'recording_instrument_id');
    }

    public function pairedInstrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'paired_instrument_id');
    }
}
