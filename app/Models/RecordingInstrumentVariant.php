<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordingInstrumentVariant extends Model
{
    protected $fillable = [
        'recording_instrument_id',
        'chip_label',
        'name',
        'style_label',
        'character_body',
        'when_text',
        'sort_order',
    ];

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'recording_instrument_id');
    }
}
