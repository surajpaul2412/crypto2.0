<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| 🌐 Frontend Routes (localized)
|--------------------------------------------------------------------------
| These routes are wrapped with locale prefixes like /en or /de
| Example: /en/contact-us, /de/about
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        // Public Frontend Pages
        Route::get('/', function () {
            return Inertia::render('Welcome', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        })->name('home');

        // Example frontend localized pages
        Route::get('/contact-us', fn() => Inertia::render('Frontend/Contact'))->name('contact');
        Route::get('/about-us', fn() => Inertia::render('Frontend/About'))->name('about');
        Route::get('/plans', fn() => Inertia::render('Frontend/Plans'))->name('plans');

        // You can keep adding more localized pages here...
    }
);

/*
|--------------------------------------------------------------------------
| 🔐 Backend Routes (no locale prefix)
|--------------------------------------------------------------------------
| These are admin, customer, and authenticated routes.
| URLs will remain plain: /dashboard, /admin/dashboard, /customer/dashboard
*/

// Redirect based on role
Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'customer';
    return redirect($role === 'admin' ? '/admin/dashboard' : '/customer/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');
});

// Customer-only routes
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return Inertia::render('Customer/Dashboard');
    })->name('customer.dashboard');
});

// Auth routes (from Breeze)
require __DIR__ . '/auth.php';
