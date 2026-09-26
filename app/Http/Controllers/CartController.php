<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        return view('frontend.cart', $this->buildCartData($request));
    }

    public function store(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $product = Product::where('slug', $slug)->published()->first();
        if (!$product) {
            abort(404);
        }

        // Digital licence: one copy per product, so re-adding never increments.
        $cart = $request->session()->get('cart', []);
        $alreadyInCart = isset($cart[$slug]);
        $cart[$slug] = ['quantity' => 1];
        $request->session()->put('cart', $cart);

        $cartCount = count($cart);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok' => true,
                'message' => $product->name . ($alreadyInCart ? ' is already in your cart.' : ' added to cart.'),
                'cartCount' => $cartCount,
                'itemQty' => 1,
                'inCart' => true,
                'alreadyInCart' => $alreadyInCart,
            ]);
        }

        return back()->with('success', $product->name . ($alreadyInCart ? ' is already in your cart.' : ' added to cart.'));
    }

    public function destroy(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$slug]);
        $request->session()->put('cart', $cart);

        if ($request->expectsJson() || $request->ajax()) {
            $subtotal = $this->calculateSubtotal($cart);

            return response()->json([
                'ok' => true,
                'message' => 'Item removed from cart.',
                'subtotal' => $subtotal,
                'subtotalDisplay' => '$' . number_format($subtotal, 2),
                'cartCount' => count($cart),
                'inCart' => false,
            ]);
        }

        return back()->with('success', 'Item removed from cart.');
    }

    private function calculateSubtotal(array $cart): float
    {
        if (empty($cart)) {
            return 0.0;
        }

        $products = Product::whereIn('slug', array_keys($cart))->get()->keyBy('slug');
        $subtotal = 0.0;

        foreach ($cart as $slug => $entry) {
            $product = $products->get($slug);
            if (!$product) {
                continue;
            }
            $subtotal += (float) $product->price;
        }

        return $subtotal;
    }

    private function buildCartData(Request $request): array
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::whereIn('slug', array_keys($cart))->get()->keyBy('slug');
        $items = [];
        $subtotal = 0.0;

        foreach ($cart as $slug => $entry) {
            $product = $products->get($slug);
            if (!$product) {
                continue;
            }

            $quantity = 1; // one licence per product
            $lineTotal = (float) $product->price;
            $subtotal += $lineTotal;

            $items[] = [
                'slug' => $slug,
                'name' => $product->name,
                'edition' => ucfirst($product->format),
                'image' => $product->imageUrl(),
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'line_total' => $lineTotal,
            ];
        }

        return [
            'items' => $items,
            'subtotal' => $subtotal,
        ];
    }
}
