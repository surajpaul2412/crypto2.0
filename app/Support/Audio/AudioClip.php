<?php

namespace App\Support\Audio;

/**
 * A plan for serving the first N seconds of an audio file without ever
 * reading (or sending) the rest of it:
 *   - read exactly `sourceStart`..`sourceStart+sourceLength-1` from the
 *     original file in storage,
 *   - if `header` is set, send that instead of the source bytes' own
 *     header (WAV: a fresh, correctly-sized 44-byte header, since the
 *     clipped body is shorter than the original file claims),
 *   - otherwise send the source bytes unchanged (MP3: frames are
 *     self-contained, no header rewrite needed).
 */
final class AudioClip
{
    public function __construct(
        public readonly int $sourceStart,
        public readonly int $sourceLength,
        public readonly ?string $header = null,
    ) {
    }

    public function totalBytes(): int
    {
        return ($this->header !== null ? strlen($this->header) : 0) + $this->sourceLength;
    }
}
