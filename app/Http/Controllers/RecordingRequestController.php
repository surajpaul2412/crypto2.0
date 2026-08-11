<?php

namespace App\Http\Controllers;

use App\Models\RecordingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecordingRequestController extends Controller
{
    /**
     * Store a "Tell us about your cue" booking-form submission
     * (recording-services page).
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:100',
            'instruments' => 'required|array|min:1',
            'instruments.*' => 'string|max:100',
            'bpm' => 'nullable|string|max:100',
            'raga' => 'nullable|string|max:100',
            'brief' => 'nullable|string|max:3000',
            'reference_links' => 'nullable|array',
            'reference_links.*' => 'nullable|url|max:500',
            'deadline' => 'nullable|date',
            'nda' => 'nullable|boolean',
            'social_ok' => 'nullable|boolean',
            'meta' => 'nullable|array',
            'meta.surface' => 'nullable|string|max:255',
            'meta.submittedAt' => 'nullable|date',
        ]);

        $recordingRequest = RecordingRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'project_name' => $validated['project_name'],
            'project_type' => $validated['project_type'],
            'instruments' => $validated['instruments'],
            'bpm' => $validated['bpm'] ?? null,
            'raga' => $validated['raga'] ?? null,
            'brief' => $validated['brief'] ?? null,
            'reference_links' => array_values(array_filter($validated['reference_links'] ?? [])),
            'deadline' => $validated['deadline'] ?? null,
            'nda' => $request->boolean('nda'),
            'social_ok' => $request->boolean('social_ok'),
            'surface' => $validated['meta']['surface'] ?? null,
            'user_agent' => $request->userAgent(),
            'ip_address' => $request->ip(),
            'submitted_at' => $validated['meta']['submittedAt'] ?? now(),
        ]);

        return response()->json(['ok' => true, 'id' => $recordingRequest->id]);
    }
}
