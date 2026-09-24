<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

/**
 * Admin-inbox read/unread state, stored in a nullable `read_at` column.
 */
trait HasReadStatus
{
    public function initializeHasReadStatus(): void
    {
        $this->mergeFillable(['read_at']);
        $this->mergeCasts(['read_at' => 'datetime']);
    }

    public function scopeUnread(Builder $query): Builder
    {
        return $query->whereNull('read_at');
    }

    public function isUnread(): bool
    {
        return $this->read_at === null;
    }

    public function markAsRead(): void
    {
        if ($this->isUnread()) {
            $this->forceFill(['read_at' => now()])->save();
        }
    }
}
