<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapRegion extends Model
{
    protected $fillable = [
        'state_key',
        'name',
        'type',
        'region',
        'tradition',
        'instruments',
        'library_url',
        'collab_url',
    ];

    /**
     * Shape consumed by the homepage India map's client-side PopupController
     * (STATE_DATA in welcome-content.blade.php). Keys mirror the original
     * hand-authored JS objects exactly so that file needs zero logic changes
     * beyond swapping its data source.
     */
    public function toStateDataArray(): array
    {
        return [
            'tradition' => $this->tradition,
            'instruments' => $this->instruments,
            'library' => $this->resolveUrl($this->library_url) ?? $this->resolveUrl('/shop'),
            'collab' => $this->resolveUrl($this->collab_url) ?? $this->resolveUrl('/collaboration'),
        ];
    }

    /**
     * Admin enters plain site-relative paths like "/shop" (portable, easy to
     * read/edit). Resolve those against the current request — locale prefix
     * included (every frontend route lives under /{locale}/..., e.g.
     * /en/shop) and correct whether the app is served from the domain root
     * or the XAMPP subdirectory install — same as route()/asset() elsewhere
     * on this site. A full external URL (http://, https://, mailto:, ...)
     * is left untouched.
     */
    private function resolveUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (preg_match('#^[a-z][a-z0-9+.-]*:#i', $path)) {
            return $path;
        }

        return url('/' . app()->getLocale() . '/' . ltrim($path, '/'));
    }
}
