<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Store a CC-ENQUIRY-HUB submission (contact / collaborate / recording forms).
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|string|in:general,recording,collaborator',
            'programme' => 'nullable|string|max:60',
            'routeKey' => 'nullable|string|max:80',
            'fields' => 'required|array',
            'fields.name' => 'nullable|string|max:255',
            'fields.email' => 'nullable|email|max:255',
            'agree' => 'nullable|boolean',
            'meta' => 'nullable|array',
            'meta.surface' => 'nullable|string|max:255',
            'meta.submittedAt' => 'nullable|date',
        ]);

        // Use the raw `fields` payload for storage — $validated['fields'] would be
        // pruned down to only the fields.* sub-keys declared above (name/email),
        // dropping every other dynamic field (message, links, toggles, acks…).
        $fields = $request->input('fields', []);

        $enquiry = Enquiry::create([
            'type' => $validated['type'],
            'programme' => $validated['programme'] ?? null,
            'route_key' => $validated['routeKey'] ?? null,
            'name' => $fields['name'] ?? null,
            'email' => $fields['email'] ?? null,
            'fields' => $fields,
            'agree' => $request->boolean('agree'),
            'surface' => $validated['meta']['surface'] ?? null,
            'user_agent' => $request->userAgent(),
            'ip_address' => $request->ip(),
            'submitted_at' => $validated['meta']['submittedAt'] ?? now(),
        ]);

        return response()->json(['ok' => true, 'id' => $enquiry->id]);
    }
}
