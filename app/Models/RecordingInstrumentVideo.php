<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordingInstrumentVideo extends Model
{
    protected $fillable = [
        'recording_instrument_id',
        'yt_id',
        'role_label',
        'caption',
        'duration_label',
        'sort_order',
    ];

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'recording_instrument_id');
    }
}
