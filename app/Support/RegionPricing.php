<?php

namespace App\Support;

use Illuminate\Http\Request;

/**
 * Decides which currency a visitor should see: INR for India, USD for
 * everyone else. Detection is Cloudflare-based — when this site is proxied
 * through Cloudflare (orange-cloud DNS), Cloudflare adds a `CF-IPCountry`
 * header to every request for free, with no API calls or extra
 * infrastructure on our side. If the site isn't behind Cloudflare yet, that
 * header is simply absent and every visitor safely sees USD (the fallback).
 */
class RegionPricing
{
    public const INDIA = 'IN';

    /**
     * Local-only escape hatch so the India branch can be exercised without
     * a live Cloudflare-proxied deployment: visit any page with
     * `?_country=IN` while APP_ENV=local. Ignored in every other
     * environment — never trust a query string for this in production.
     */
    public function isIndia(?Request $request = null): bool
    {
        return $this->countryCode($request) === self::INDIA;
    }

    public function countryCode(?Request $request = null): ?string
    {
        $request ??= request();

        $cfCountry = $request->header('CF-IPCountry');
        if (filled($cfCountry)) {
            return strtoupper($cfCountry);
        }

        if (app()->environment('local') && filled($request->query('_country'))) {
            return strtoupper((string) $request->query('_country'));
        }

        return null;
    }

    public function currencyCode(?Request $request = null): string
    {
        return $this->isIndia($request) ? 'INR' : 'USD';
    }
}
