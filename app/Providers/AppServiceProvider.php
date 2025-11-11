<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ✅ Keep your existing Vite optimization
        Vite::prefetch(concurrency: 3);

        // ✅ Share translations dynamically with Inertia
        Inertia::share('lang', function () {
            $locale = LaravelLocalization::getCurrentLocale();

            // Load translations from /resources/lang/{locale}/messages.php
            $translations = __('messages', locale: $locale);

            return $translations;
        });

        // ✅ Also share current locale with frontend
        Inertia::share('locale', fn () => LaravelLocalization::getCurrentLocale());
    }
}
