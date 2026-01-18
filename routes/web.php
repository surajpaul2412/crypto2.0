<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Customer\DashboardController;

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
        Route::get('/', function () {
            return view('frontend.welcome', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        })->name('home');

        // Frontend Pages (Blade)
        Route::get('/about-us', fn() => view('frontend.about'))->name('about');
        Route::get('/team', fn() => view('frontend.team'))->name('team');

        Route::get('/contact-us', fn() => view('frontend.contact'))->name('contact');
        Route::get('/about-us', fn() => view('frontend.about'))->name('about');
        Route::get('/plans', fn() => view('frontend.plans'))->name('plans');

        // Route::get('/login', fn() => view('frontend.login'))->name('login');
        // Route::get('/register', fn() => view('frontend.register'))->name('register');
    }
);

/*
|--------------------------------------------------------------------------
| 🔐 Backend Routes (NO Inertia)
|--------------------------------------------------------------------------
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

// Admin Dashboard (Blade)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Customer Dashboard (Blade)
Route::middleware(['auth','role:customer'])->group(function () {
    Route::get('/customer/dashboard', [DashboardController::class, 'index'])
        ->name('customer.dashboard');
});

// Auth routes
require __DIR__ . '/auth.php';
