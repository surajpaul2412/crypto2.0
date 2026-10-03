<?php

namespace App\Support\Audio;

use RuntimeException;

/**
 * Works out the byte range for "roughly the first N seconds" of an MP3,
 * by reading the bitrate off the first audio frame and estimating bytes
 * from there. MP3 frames are self-contained, so — unlike WAV — no header
 * rewrite is needed; a byte range starting at a frame boundary is already
 * a valid, playable MP3.
 *
 * This is an estimate, not an exact cut: a variable-bitrate file's later
 * frames can run at a different rate than the first one, so the clip may
 * land a little short of or past the target length. For a preview that's
 * fine — it's never going to land dramatically off, and worst case is a
 * few seconds either side of `$seconds`.
 *
 * Only needs the first `$prefix` bytes (an ID3v2 tag plus a handful of KB
 * of audio is always enough to reach the first frame) — never the whole
 * master.
 */
class Mp3PreviewPlanner
{
    /** [version][layer][bitrateIndex] => kbps. version: 1=MPEG1, 2=MPEG2/2.5. layer: 1,2,3. */
    private const BITRATES = [
        1 => [
            3 => [0, 32, 40, 48, 56, 64, 80, 96, 112, 128, 160, 192, 224, 256, 320],
            2 => [0, 32, 48, 56, 64, 80, 96, 112, 128, 160, 192, 224, 256, 320, 384],
            1 => [0, 32, 64, 96, 128, 160, 192, 224, 256, 288, 320, 352, 384, 416, 448],
        ],
        2 => [
            3 => [0, 8, 16, 24, 32, 40, 48, 56, 64, 80, 96, 112, 128, 144, 160],
            2 => [0, 8, 16, 24, 32, 40, 48, 56, 64, 80, 96, 112, 128, 144, 160],
            1 => [0, 32, 48, 56, 64, 80, 96, 112, 128, 144, 160, 176, 192, 224, 256],
        ],
    ];

    public function plan(string $prefix, int $fileSize, int $seconds): AudioClip
    {
        $audioStart = $this->skipId3v2($prefix);
        $frame = $this->findFirstFrame($prefix, $audioStart);

        if ($frame === null) {
            throw new RuntimeException('Could not locate an MPEG audio frame within the read prefix.');
        }

        $bytesPerSecond = ($frame['bitrateKbps'] * 1000) / 8;
        $remaining = max(0, $fileSize - $audioStart);
        $clipLength = (int) min($remaining, $bytesPerSecond * $seconds);

        return new AudioClip($audioStart, $clipLength);
    }

    private function skipId3v2(string $prefix): int
    {
        if (strlen($prefix) < 10 || substr($prefix, 0, 3) !== 'ID3') {
            return 0;
        }

        // Synchsafe 28-bit big-endian size: top bit of each byte is always 0.
        $b = array_values(unpack('C4', substr($prefix, 6, 4)));
        $size = ($b[0] << 21) | ($b[1] << 14) | ($b[2] << 7) | $b[3];

        return 10 + $size;
    }

    /** @return array{bitrateKbps: int}|null */
    private function findFirstFrame(string $prefix, int $from): ?array
    {
        $len = strlen($prefix);

        for ($i = $from; $i < $len - 4; $i++) {
            if (ord($prefix[$i]) !== 0xFF || (ord($prefix[$i + 1]) & 0xE0) !== 0xE0) {
                continue;
            }

            $b2 = ord($prefix[$i + 1]);
            $b3 = ord($prefix[$i + 2]);

            $versionBits = ($b2 >> 3) & 0x03; // 00=MPEG2.5 01=reserved 10=MPEG2 11=MPEG1
            $layerBits = ($b2 >> 1) & 0x03;   // 01=Layer3 10=Layer2 11=Layer1
            $bitrateIndex = ($b3 >> 4) & 0x0F;

            if ($versionBits === 1 || $layerBits === 0 || $bitrateIndex === 0 || $bitrateIndex === 15) {
                continue; // reserved/free-bitrate — not a frame header we can size from
            }

            $version = $versionBits === 3 ? 1 : 2;
            $layer = [3 => 1, 2 => 2, 1 => 3][$layerBits];
            $kbps = self::BITRATES[$version][$layer][$bitrateIndex] ?? null;

            if ($kbps === null || $kbps === 0) {
                continue;
            }

            return ['bitrateKbps' => $kbps];
        }

        return null;
    }
}
