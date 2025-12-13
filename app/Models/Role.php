<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relationship with users (optional but recommended)
    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }
}
