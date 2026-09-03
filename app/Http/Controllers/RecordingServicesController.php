<?php

namespace App\Http\Controllers;

use App\Models\Faq;
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
            'faqs' => Faq::forPageOrdered('recording-services'),
        ]);
    }

    public function show(string $slug)
    {
        $instrument = RecordingInstrument::published()
            ->where('detail_slug', $slug)
            ->with([
                'category',
                'videos',
                'tracks',
                'anatomyParts',
                'variants',
                'pairs.pairedInstrument',
                'faqs' => fn ($q) => $q->active(),
            ])
            ->firstOrFail();

        return view('frontend.recording-services-inner', [
            'instrument' => $instrument,
        ]);
    }
}
