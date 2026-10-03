<?php

namespace App\Support\Audio;

use RuntimeException;

class AudioPreviewPlanner
{
    public function plan(string $mimeType, string $prefix, int $fileSize, int $seconds): AudioClip
    {
        return match (true) {
            str_contains($mimeType, 'wav') => (new WavPreviewPlanner)->plan($prefix, $fileSize, $seconds),
            str_contains($mimeType, 'mp3'), str_contains($mimeType, 'mpeg') => (new Mp3PreviewPlanner)->plan($prefix, $fileSize, $seconds),
            default => throw new RuntimeException("Unsupported audio type for preview clipping: {$mimeType}"),
        };
    }
}
