<?php

namespace App\Http\Controllers;

use App\Models\ProductTrack;
use App\Support\Audio\AudioPreviewPlanner;
use App\Support\Audio\RangedStorageReader;
use Illuminate\Http\Response;

/**
 * Serves "the first N seconds" of a product's demo track — never the full
 * master file. The route this sits behind is signed and time-limited
 * (see ProductTrack::previewUrl()), so the link itself can't be bookmarked
 * or shared for later use either.
 *
 * Nothing here ever reads (or sends) more of the source file than the
 * clip requires — see RangedStorageReader.
 */
class ProductTrackPreviewController extends Controller
{
    private const DISK = 'r2';

    public function show(ProductTrack $track, RangedStorageReader $reader, AudioPreviewPlanner $planner): Response
    {
        $fileSize = $reader->fileSize(self::DISK, $track->audio_path);
        $prefix = $reader->readPrefix(self::DISK, $track->audio_path);

        $mimeType = $track->mime_type ?? 'audio/wav';
        $clip = $planner->plan($mimeType, $prefix, $fileSize, $track->preview_seconds);

        $body = $reader->readRange(self::DISK, $track->audio_path, $clip->sourceStart, $clip->sourceLength);
        if ($clip->header !== null) {
            $body = $clip->header . $body;
        }

        $extension = str_contains($mimeType, 'wav') ? 'wav' : 'mp3';

        return response($body, 200, [
            'Content-Type' => $mimeType,
            'Content-Length' => (string) strlen($body),
            'Content-Disposition' => 'inline; filename="preview.' . $extension . '"',
            // Never cached by a shared/CDN cache, and not stored on disk by
            // the browser either — each play re-fetches through the
            // signed route, which is the point (short TTL, no durable copy).
            'Cache-Control' => 'private, no-store, max-age=0',
            'X-Content-Type-Options' => 'nosniff',
            'Accept-Ranges' => 'none',
        ]);
    }
}
