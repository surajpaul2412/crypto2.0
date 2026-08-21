<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\View;
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
        Vite::prefetch(concurrency: 3);

        // The 'public_assets' disk (used by Filament's FileUpload/ImageColumn
        // for site images) needs an absolute base URL, but a static one baked
        // from .env's APP_URL breaks the moment the app is served from a
        // different host — e.g. `php artisan serve` on 127.0.0.1:8000 next to
        // XAMPP on localhost/client/crypto2.0/public. Both point at the same
        // files, but the browser treats them as different origins, so image
        // fetches against the "wrong" host get CORS-blocked. Resolving the
        // disk's URL from the current request (same mechanism asset()/url()
        // already use) keeps it correct no matter which host serves it.
        if (! $this->app->runningInConsole()) {
            config(['filesystems.disks.public_assets.url' => rtrim(url('/'), '/')]);
        }

        Inertia::share('lang', function () {
            $locale = LaravelLocalization::getCurrentLocale();
            return __('messages', locale: $locale);
        });

        Inertia::share('locale', fn () => LaravelLocalization::getCurrentLocale());

        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = collect($cart)->sum(fn ($item) => (int) ($item['quantity'] ?? 0));
            $wishlist = session('wishlist', []);
            $wishlistCount = count($wishlist);

            $view->with('cartCount', $cartCount);
            $view->with('wishlistCount', $wishlistCount);
        });
    }
}
