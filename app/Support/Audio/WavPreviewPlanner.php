<?php

namespace App\Support\Audio;

use RuntimeException;

/**
 * Works out the byte range for "the first N seconds" of a WAV file, and
 * builds a correctly-sized replacement header for it — a truncated WAV
 * with its original (longer) header is technically malformed (most
 * players tolerate it, but some don't), so we never ship that.
 *
 * Only needs the first `$prefix` bytes of the file (a few hundred KB at
 * most covers RIFF + fmt + any metadata chunks before `data` on every WAV
 * we've seen) — never the whole master.
 */
class WavPreviewPlanner
{
    public function plan(string $prefix, int $fileSize, int $seconds): AudioClip
    {
        if (strlen($prefix) < 12 || substr($prefix, 0, 4) !== 'RIFF' || substr($prefix, 8, 4) !== 'WAVE') {
            throw new RuntimeException('Not a RIFF/WAVE file.');
        }

        $offset = 12;
        $channels = null;
        $sampleRate = null;
        $bitsPerSample = null;
        $dataStart = null;
        $dataSize = null;

        while ($offset + 8 <= strlen($prefix)) {
            $chunkId = substr($prefix, $offset, 4);
            $chunkSize = unpack('V', substr($prefix, $offset + 4, 4))[1];
            $bodyStart = $offset + 8;

            if ($chunkId === 'fmt ' && $bodyStart + 16 <= strlen($prefix)) {
                $fmt = unpack('vaudioFormat/vchannels/VsampleRate/VbyteRate/vblockAlign/vbitsPerSample', substr($prefix, $bodyStart, 16));
                $channels = $fmt['channels'];
                $sampleRate = $fmt['sampleRate'];
                $bitsPerSample = $fmt['bitsPerSample'];
            }

            if ($chunkId === 'data') {
                $dataStart = $bodyStart;
                // A streamed/placeholder WAV can declare size 0 or 0xFFFFFFFF;
                // fall back to "everything to end of file" in that case.
                $dataSize = ($chunkSize > 0 && $chunkSize !== 0xFFFFFFFF && $bodyStart + $chunkSize <= $fileSize)
                    ? $chunkSize
                    : max(0, $fileSize - $bodyStart);
                break;
            }

            // Chunks are padded to an even byte count.
            $offset = $bodyStart + $chunkSize + ($chunkSize % 2);
        }

        if ($channels === null || $sampleRate === null || $bitsPerSample === null || $dataStart === null) {
            throw new RuntimeException('Could not locate fmt/data chunks within the read prefix.');
        }

        $blockAlign = max(1, $channels * ($bitsPerSample / 8));
        $byteRate = $sampleRate * $blockAlign;

        $clipLength = (int) min($dataSize, $byteRate * $seconds);
        $clipLength -= $clipLength % $blockAlign; // keep whole samples only

        return new AudioClip($dataStart, $clipLength, $this->buildHeader($channels, $sampleRate, $bitsPerSample, $clipLength));
    }

    private function buildHeader(int $channels, int $sampleRate, int $bitsPerSample, int $dataLength): string
    {
        $blockAlign = $channels * ($bitsPerSample / 8);
        $byteRate = $sampleRate * $blockAlign;

        return 'RIFF'
            . pack('V', 36 + $dataLength)
            . 'WAVE'
            . 'fmt '
            . pack('V', 16)
            . pack('v', 1) // PCM
            . pack('v', $channels)
            . pack('V', $sampleRate)
            . pack('V', $byteRate)
            . pack('v', (int) $blockAlign)
            . pack('v', $bitsPerSample)
            . 'data'
            . pack('V', $dataLength);
    }
}
