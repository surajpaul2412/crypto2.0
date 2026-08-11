<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'type',
        'programme',
        'route_key',
        'name',
        'email',
        'fields',
        'agree',
        'surface',
        'user_agent',
        'ip_address',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'fields' => 'array',
            'agree' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }
}
