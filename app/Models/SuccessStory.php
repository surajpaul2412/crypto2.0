<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'name',
        'role',
        'teaser',
        'quote',
        'card_quote',
        'image_path',
        'youtube_id',
        'credits',
        'note',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'credits' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function imageUrl(): ?string
    {
        return $this->image_path ? asset($this->image_path) : null;
    }

    public function hasVideo(): bool
    {
        return filled($this->youtube_id);
    }

    /**
     * Short pull-quote shown on the grid card (distinct from the full
     * `quote` shown in the modal). Falls back to a truncated `quote` so a
     * story created without filling the optional card blurb still renders.
     */
    public function cardQuote(): string
    {
        return $this->card_quote ?: \Illuminate\Support\Str::limit($this->quote, 60);
    }

    /**
     * First + last initial, e.g. "A.R. Rahman" -> "AR". Mirrors the client-side
     * monogram() in success-stories-page-scripts.blade.php exactly, so the
     * server-rendered card and the JS-rendered modal never disagree.
     */
    public function monogram(): string
    {
        $parts = array_values(array_filter(preg_split('/[ .]+/', preg_replace('/[^A-Za-z. ]/', '', $this->name))));

        if (empty($parts)) {
            return '—';
        }

        $first = mb_substr($parts[0], 0, 1);
        $last = count($parts) > 1 ? mb_substr(end($parts), 0, 1) : '';

        return mb_strtoupper($first . $last);
    }

    /**
     * Shape consumed by the client-side modal controller's STORIES array
     * (window.__SUCCESS_STORIES__). Keys mirror the original hand-authored
     * JS objects exactly so success-stories-page-scripts.blade.php needs
     * zero logic changes beyond swapping its data source.
     */
    public function toStoryArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img' => $this->imageUrl(),
            'role' => $this->role,
            'teaser' => $this->teaser,
            'quote' => $this->quote,
            'video' => $this->youtube_id ?? '',
            'credits' => $this->credits ?? [],
            'note' => $this->note,
        ];
    }

    /**
     * Shape consumed by the homepage "Composers who play our instruments"
     * marquee (COMPOSER-ROW-001 in welcome-content.blade.php). Same data as
     * toStoryArray() but the keys/naming that section's client-side
     * cardHTML() already expects — kept separate so a change to one card
     * layout's shape doesn't ripple into the other's JS unexpectedly.
     */
    public function toComposerRowArray(): array
    {
        return [
            'name' => $this->name,
            'designation' => $this->role,
            'projects' => $this->credits ?? [],
            'img' => $this->imageUrl() ?? '',
            'mono' => $this->monogram(),
            'video' => $this->hasVideo(),
        ];
    }
}
