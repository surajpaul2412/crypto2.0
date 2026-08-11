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
