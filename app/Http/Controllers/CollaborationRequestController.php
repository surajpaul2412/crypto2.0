<?php

namespace App\Http\Controllers;

use App\Models\CollaborationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollaborationRequestController extends Controller
{
    /**
     * Store a CC-ENQUIRY-HUB "collaborator" submission (Collaborate page).
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|string|in:collaborator',
            'programme' => 'required|string|in:artists,composers,sound,content,producers,ksp,web,designers,affiliates',
            'routeKey' => 'nullable|string|max:80',
            'fields' => 'required|array',
            'fields.name' => 'required|string|max:255',
            'fields.based' => 'nullable|string|max:255',
            'fields.why' => 'nullable|string|max:2000',
            'agree' => 'nullable|boolean',
            'meta' => 'nullable|array',
            'meta.surface' => 'nullable|string|max:255',
            'meta.submittedAt' => 'nullable|date',
        ]);

        // Raw payload for storage — $validated['fields'] would be pruned down to
        // only the fields.* sub-keys declared above, dropping `links`/`consent`.
        $fields = $request->input('fields', []);

        $links = $fields['links'] ?? [];
        if (! is_array($links)) {
            $links = array_filter([$links]);
        }

        $collaborationRequest = CollaborationRequest::create([
            'programme' => $validated['programme'],
            'route_key' => $validated['routeKey'] ?? null,
            'name' => $fields['name'] ?? null,
            'based' => $fields['based'] ?? null,
            'links' => array_values($links),
            'why' => $fields['why'] ?? null,
            'consent' => (bool) ($fields['consent'] ?? false),
            'agree' => $request->boolean('agree'),
            'fields' => $fields,
            'surface' => $validated['meta']['surface'] ?? null,
            'user_agent' => $request->userAgent(),
            'ip_address' => $request->ip(),
            'submitted_at' => $validated['meta']['submittedAt'] ?? now(),
        ]);

        return response()->json(['ok' => true, 'id' => $collaborationRequest->id]);
    }
}
