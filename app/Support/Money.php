<?php

namespace App\Support;

/**
 * Formats an amount for display given a currency code. Kept as one place so
 * the symbol/decimals convention (no decimals on card badges, two decimals
 * in cart/checkout line items) stays consistent everywhere prices are shown.
 */
class Money
{
    public static function symbol(string $currencyCode): string
    {
        return strtoupper($currencyCode) === 'INR' ? '₹' : '$';
    }

    public static function format(float $amount, string $currencyCode, int $decimals = 2): string
    {
        return self::symbol($currencyCode) . number_format($amount, $decimals);
    }
}
