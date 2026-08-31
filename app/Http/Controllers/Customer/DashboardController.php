<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $orders = $user->orders()
            ->with('items')
            ->orderByDesc('placed_at')
            ->get();

        // "My Library" — distinct products owned across all orders, most
        // recently purchased first. Snapshot fields on the order item (not
        // a live Product lookup) so this still shows correctly even if a
        // product is later renamed, re-priced, or removed.
        $ownedProducts = $orders
            ->flatMap(fn ($order) => $order->items)
            ->unique('slug')
            ->values();

        $downloadsCount = $orders->flatMap(fn ($order) => $order->items)->sum('quantity');

        return view('customer.dashboard', [
            'user' => $user,
            'orders' => $orders,
            'recentOrders' => $orders->take(5),
            'ownedProducts' => $ownedProducts,
            'recentProducts' => $ownedProducts->take(6),
            'productsCount' => $ownedProducts->count(),
            'downloadsCount' => $downloadsCount,
            'ordersCount' => $orders->count(),
        ]);
    }
}
