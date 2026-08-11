<?php

namespace App\Http\Controllers;

use App\Models\InstrumentCategory;
use App\Models\RecordingInstrument;

class RecordingServicesController extends Controller
{
    public function index()
    {
        // Grid order is curated (not grouped) — global sort_order preserves that.
        $recordingInstruments = RecordingInstrument::published()
            ->with('category')
            ->orderBy('sort_order')
            ->get();

        $instrumentCategories = InstrumentCategory::where('is_active', true)
            ->withCount(['instruments' => fn ($q) => $q->published()])
            ->having('instruments_count', '>', 0)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.recording-services', [
            'recordingInstruments' => $recordingInstruments,
            'instrumentCategories' => $instrumentCategories,
        ]);
    }
}
