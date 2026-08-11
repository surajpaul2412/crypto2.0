<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(Request $request): View
    {
        $wishlist = $request->session()->get('wishlist', []);
        $products = Product::whereIn('slug', array_keys($wishlist))->get()->keyBy('slug');
        $items = [];

        foreach (array_keys($wishlist) as $slug) {
            $product = $products->get($slug);
            if (!$product) {
                continue;
            }

            $items[] = [
                'slug' => $slug,
                'name' => $product->name,
                'edition' => ucfirst($product->format),
                'label' => $product->flagship ? 'Flagship' : ucfirst($product->tags->first()->label ?? ''),
                'price' => (float) $product->price,
                'image' => $product->imageUrl(),
            ];
        }

        return view('frontend.wishlist', ['items' => $items]);
    }

    public function store(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $product = Product::where('slug', $slug)->published()->first();
        if (!$product) {
            abort(404);
        }

        $wishlist = $request->session()->get('wishlist', []);
        $wishlist[$slug] = ['added_at' => now()->toDateTimeString()];
        $request->session()->put('wishlist', $wishlist);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok' => true,
                'message' => $product->name . ' added to wishlist.',
                'wishlistCount' => count($wishlist),
                'inWishlist' => true,
            ]);
        }

        return back()->with('success', $product->name . ' added to wishlist.');
    }

    public function destroy(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $wishlist = $request->session()->get('wishlist', []);
        unset($wishlist[$slug]);
        $request->session()->put('wishlist', $wishlist);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok' => true,
                'message' => 'Item removed from wishlist.',
                'wishlistCount' => count($wishlist),
                'inWishlist' => false,
            ]);
        }

        return back()->with('success', 'Item removed from wishlist.');
    }

    public function moveToCart(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $product = Product::where('slug', $slug)->published()->first();
        if (!$product) {
            abort(404);
        }

        $wishlist = $request->session()->get('wishlist', []);
        $cart = $request->session()->get('cart', []);

        $quantity = (int) ($cart[$slug]['quantity'] ?? 0);
        $cart[$slug] = ['quantity' => $quantity + 1];
        unset($wishlist[$slug]);

        $request->session()->put('cart', $cart);
        $request->session()->put('wishlist', $wishlist);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok' => true,
                'message' => $product->name . ' moved to cart.',
                'wishlistCount' => count($wishlist),
                'cartCount' => collect($cart)->sum(fn ($item) => (int) ($item['quantity'] ?? 0)),
            ]);
        }

        return back()->with('success', $product->name . ' moved to cart.');
    }
}
