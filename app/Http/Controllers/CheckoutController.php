<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $order = $this->buildOrderData($request);
        if (count($order['items']) === 0) {
            return redirect()->route('shop')->with('success', 'Your cart is empty.');
        }

        return view('frontend.checkout', [
            'items' => $order['items'],
            'subtotal' => $order['subtotal'],
            'customer' => [
                'name' => old('name', optional($request->user())->name),
                'email' => old('email', optional($request->user())->email),
                'phone' => old('phone', ''),
                'country' => old('country', 'India'),
                'payment_method' => old('payment_method', 'upi'),
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $order = $this->buildOrderData($request);
        if (count($order['items']) === 0) {
            return redirect()->route('shop')->with('success', 'Your cart is empty.');
        }

        $customer = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:30'],
            'country' => ['required', 'string', 'max:80'],
            'payment_method' => ['required', 'in:upi,card,bank,paypal'],
        ]);

        $orderNumber = 'CC-' . now()->format('Ymd-His') . '-' . random_int(1000, 9999);
        $request->session()->put('last_order', [
            'order_number' => $orderNumber,
            'customer' => $customer,
            'items' => $order['items'],
            'subtotal' => $order['subtotal'],
            'placed_at' => now()->format('d M Y, h:i A'),
        ]);

        $request->session()->forget('cart');

        return redirect()
            ->route('checkout.success')
            ->with('success', 'Order placed successfully.');
    }

    public function success(Request $request): View|RedirectResponse
    {
        $lastOrder = $request->session()->get('last_order');
        if (!$lastOrder) {
            return redirect()->route('shop');
        }

        return view('frontend.checkout-success', ['order' => $lastOrder]);
    }

    private function buildOrderData(Request $request): array
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
            $lineTotal = $quantity * (float) $product->price;
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
