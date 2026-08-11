<?php

namespace App\Http\Controllers;

use App\Models\HeritageCategory;
use App\Models\HeritagePerformance;

class HeritagePerformanceController extends Controller
{
    public function index()
    {
        // Grid order is a curated mix across categories (not grouped) — global
        // sort_order preserves that, matching the original hand-laid-out grid.
        $heritagePerformances = HeritagePerformance::published()
            ->with('category')
            ->orderBy('sort_order')
            ->get();

        $heritageCategories = HeritageCategory::where('is_active', true)
            ->withCount(['performances' => fn ($q) => $q->published()])
            ->having('performances_count', '>', 0)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.heritage-performances', [
            'heritagePerformances' => $heritagePerformances,
            'heritageCategories' => $heritageCategories,
        ]);
    }
}
