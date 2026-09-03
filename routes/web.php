<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SuccessStoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CollaborationRequestController;
use App\Http\Controllers\RecordingRequestController;

/*
|--------------------------------------------------------------------------
| 🌐 Frontend Routes (localized) — Pure HTML/Blade
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        // Home Page (Blade)
        Route::get('/', [WelcomeController::class, 'index'])->name('home');

        // Frontend Pages (Blade)
        Route::get('/about-us', [AboutController::class, 'index'])->name('about');
        Route::get('/shop', [ShopController::class, 'index'])->name('shop');
        Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('/wishlist/add/{slug}', [WishlistController::class, 'store'])->name('wishlist.add');
        Route::post('/wishlist/remove/{slug}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
        Route::post('/wishlist/move-to-cart/{slug}', [WishlistController::class, 'moveToCart'])->name('wishlist.move_to_cart');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{slug}', [CartController::class, 'store'])->name('cart.add');
        Route::post('/cart/update/{slug}', [CartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove/{slug}', [CartController::class, 'destroy'])->name('cart.remove');
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
        
        Route::get('/success-stories', [SuccessStoryController::class, 'index'])->name('success-stories');
        Route::get('/team', fn() => view('frontend.team'))->name('team');
        Route::get('/faq', fn() => view('frontend.faq'))->name('faq');

        Route::get('/recording-services', [\App\Http\Controllers\RecordingServicesController::class, 'index'])->name('recording-services');
        Route::get('/recording/{slug}', [\App\Http\Controllers\RecordingServicesController::class, 'show'])->name('recording-services.show');
        Route::get('/contact-us', fn() => view('frontend.contact'))->name('contact');
        Route::get('/remote-recordings', fn() => view('frontend.remote-recordings'))->name('remote-recordings');
        Route::get('/heritage-performances', [\App\Http\Controllers\HeritagePerformanceController::class, 'index'])->name('heritage-performances');
        Route::get('/collaboration', [CollaborationController::class, 'index'])->name('collaboration');
        Route::get('/cookie-policy', fn() => view('frontend.cookie-policy'))->name('cookie-policy');
        Route::get('/terms-of-service', fn() => view('frontend.terms-of-service'))->name('terms-of-service');
        Route::get('/privacy-policy', fn() => view('frontend.privacy-policy'))->name('privacy-policy');

        // others
        Route::get('/plans', fn() => view('frontend.plans'))->name('plans');
    }
);

$supportedLocalePattern = implode('|', array_keys(config('laravellocalization.supportedLocales', [])));

Route::group(
    [
        'prefix' => '{locale}',
        'where' => ['locale' => $supportedLocalePattern],
    ],
    function () {
        Route::get('/shop', [ShopController::class, 'indexLocalized'])->name('shop.localized');
        Route::get('/shop/{slug}', [ShopController::class, 'showLocalized'])->name('shop.show.localized');
    }
);

/*
|--------------------------------------------------------------------------
| 🔐 Backend Routes (NO Inertia)
|--------------------------------------------------------------------------
*/

// CC-ENQUIRY-HUB — contact / collaborate / recording enquiry forms (AJAX)
Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::post('/collaboration-requests', [CollaborationRequestController::class, 'store'])->name('collaboration-requests.store');
Route::post('/recording-requests', [RecordingRequestController::class, 'store'])->name('recording-requests.store');

// Redirect based on role
Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'customer';
    return redirect($role === 'admin' ? '/admin' : '/customer/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin panel is now FilamentPHP, mounted at /admin by App\Providers\Filament\AdminPanelProvider.

// Customer Dashboard (Blade)
Route::middleware(['auth','role:customer'])->group(function () {
    Route::get('/customer/dashboard', [DashboardController::class, 'index'])
        ->name('customer.dashboard');
});

// Auth routes
require __DIR__ . '/auth.php';
