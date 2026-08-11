<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    private const MAX_QUANTITY = 99;

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

        $cart = $request->session()->get('cart', []);
        $quantity = (int) ($cart[$slug]['quantity'] ?? 0);
        $cart[$slug] = ['quantity' => min(self::MAX_QUANTITY, $quantity + 1)];
        $request->session()->put('cart', $cart);

        $cartCount = collect($cart)->sum(fn ($item) => (int) ($item['quantity'] ?? 0));

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok' => true,
                'message' => $product->name . ' added to cart.',
                'cartCount' => $cartCount,
                'itemQty' => (int) $cart[$slug]['quantity'],
                'inCart' => true,
            ]);
        }

        return back()->with('success', $product->name . ' added to cart.');
    }

    public function update(Request $request, string $slug): RedirectResponse|JsonResponse
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            abort(404);
        }

        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . self::MAX_QUANTITY],
        ]);

        $cart = $request->session()->get('cart', []);
        if (!isset($cart[$slug])) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['ok' => false, 'message' => 'Item not in cart.'], 404);
            }
            return back();
        }

        $cart[$slug]['quantity'] = (int) $data['quantity'];
        $request->session()->put('cart', $cart);

        if ($request->expectsJson() || $request->ajax()) {
            $lineTotal = (float) $product->price * $cart[$slug]['quantity'];
            $subtotal = $this->calculateSubtotal($cart);

            return response()->json([
                'ok' => true,
                'quantity' => $cart[$slug]['quantity'],
                'lineTotal' => $lineTotal,
                'lineTotalDisplay' => '$' . number_format($lineTotal, 2),
                'subtotal' => $subtotal,
                'subtotalDisplay' => '$' . number_format($subtotal, 2),
                'cartCount' => collect($cart)->sum(fn ($item) => (int) ($item['quantity'] ?? 0)),
            ]);
        }

        return back()->with('success', 'Cart updated.');
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
                'cartCount' => collect($cart)->sum(fn ($item) => (int) ($item['quantity'] ?? 0)),
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
            $subtotal += (float) $product->price * max(1, (int) ($entry['quantity'] ?? 1));
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

            $quantity = max(1, (int) ($entry['quantity'] ?? 1));
            $lineTotal = (float) $product->price * $quantity;
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
