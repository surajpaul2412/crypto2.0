<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InstrumentCategory extends Model
{
    protected $fillable = [
        'slug',
        'label',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function instruments(): HasMany
    {
        return $this->hasMany(RecordingInstrument::class, 'category_id');
    }
}
