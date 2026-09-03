<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordingInstrumentAnatomyPart extends Model
{
    protected $fillable = [
        'recording_instrument_id',
        'name',
        'sub_label',
        'legend_role',
        'tooltip_text',
        'hotspot_x_pct',
        'hotspot_y_pct',
        'anchor',
        'sort_order',
    ];

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(RecordingInstrument::class, 'recording_instrument_id');
    }
}
