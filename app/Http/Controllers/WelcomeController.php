<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\MapRegion;
use App\Models\Product;
use App\Models\SuccessStory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Featured Instruments carousel on the homepage shows the N most
     * recently added products. 8 keeps the drag-scroll row substantial
     * without the client rendering/animating far more DOM than a teaser
     * section needs — the full catalogue is one tap away via "View All".
     */
    private const FEATURED_LIMIT = 8;

    public function index(): View
    {
        return view('frontend.welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'featuredProducts' => Product::published()
                ->with(['family', 'region'])
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->take(self::FEATURED_LIMIT)
                ->get(),
            'featuredComposers' => SuccessStory::active()
                ->orderBy('sort_order')
                ->get()
                ->map(fn (SuccessStory $story) => $story->toComposerRowArray())
                ->values(),
            'mapRegionsJson' => MapRegion::all()
                ->keyBy('state_key')
                ->map(fn (MapRegion $region) => $region->toStateDataArray()),
            'faqs' => Faq::forPageOrdered('home'),
        ]);
    }
}
