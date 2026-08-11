<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordingRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'project_name',
        'project_type',
        'instruments',
        'bpm',
        'raga',
        'brief',
        'reference_links',
        'deadline',
        'nda',
        'social_ok',
        'surface',
        'user_agent',
        'ip_address',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'instruments' => 'array',
            'reference_links' => 'array',
            'deadline' => 'date',
            'nda' => 'boolean',
            'social_ok' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }
}
