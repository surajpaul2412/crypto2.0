<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // TEMP / BASIC (abhi subscription system nahi hai)
        $plan = $user->activePlan ?? null;

        return view('customer.dashboard', [
            'plan'            => $plan,
            'productsCount'   => 0,
            'downloadsCount'  => 0,
            'licensesCount'   => 0,
            'ticketsCount'    => 0,
            'recentProducts'  => collect(),
            'recentDownloads' => collect(),
        ]);
    }
}
