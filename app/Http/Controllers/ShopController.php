<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFamily;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function indexLocalized(Request $request, string $locale)
    {
        app()->setLocale($locale);

        return $this->index($request);
    }

    public function index(Request $request)
    {
        $products = Product::published()
            ->with(['family', 'region', 'moods', 'usecases', 'tags'])
            ->orderBy('sort_order')
            ->get();

        $families = ProductFamily::where('is_active', true)->orderBy('sort_order')->get();
        $tags = ProductTag::where('is_active', true)->orderBy('sort_order')->get();

        return view('frontend.shop', [
            'catalogueJson' => $products->map(fn (Product $product) => $product->toCatalogueArray())->values(),
            'families' => $families,
            'tags' => $tags,
        ]);
    }

    public function showLocalized(Request $request, string $locale, string $slug)
    {
        app()->setLocale($locale);

        return $this->show($request, $slug);
    }

    public function show(Request $request, string $slug)
    {
        $product = Product::published()
            ->with(['family', 'region'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::published()
            ->where('family_id', $product->family_id)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('frontend.shop-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
