<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * Canonical page keys this FAQ can be assigned to — kept here as the
     * single source of truth for both the Filament checkbox list and each
     * page controller's scopeForPage() call.
     */
    public const PAGES = [
        'home' => 'Homepage',
        'shop' => 'Shop (Catalogue)',
        'collaboration' => 'Collaboration',
        'recording-services' => 'Recording Services',
    ];

    protected $fillable = [
        'question',
        'answer',
        'pages',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'pages' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Named "onPage" (not "forPage") on purpose — Eloquent's query builder
     * already defines a real forPage($page, $perPage) for pagination, and a
     * same-named local scope would silently shadow it for this model.
     */
    public function scopeOnPage(Builder $query, string $pageKey): Builder
    {
        return $query->whereJsonContains('pages', $pageKey);
    }

    /**
     * The active FAQs assigned to one page, in display order — the single
     * query every page controller uses to feed its FAQ accordion.
     */
    public static function forPageOrdered(string $pageKey): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()->onPage($pageKey)->orderBy('sort_order')->get();
    }

    /**
     * Answer with HTML tags stripped, for JSON-LD FAQPage schema — keeps the
     * SEO structured data in sync with whatever admins edit, without ever
     * emitting markup inside a schema.org "text" field.
     */
    public function plainAnswer(): string
    {
        return trim(strip_tags($this->answer));
    }
}
