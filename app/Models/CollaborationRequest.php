<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollaborationRequest extends Model
{
    protected $fillable = [
        'programme',
        'route_key',
        'name',
        'based',
        'links',
        'why',
        'consent',
        'agree',
        'fields',
        'surface',
        'user_agent',
        'ip_address',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'links' => 'array',
            'fields' => 'array',
            'consent' => 'boolean',
            'agree' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }
}
