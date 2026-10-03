<?php

namespace App\Support\Audio;

use Illuminate\Filesystem\AwsS3V3Adapter;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

/**
 * Reads a byte range from a file on a Storage disk, without pulling the
 * whole file into memory first.
 *
 * On an S3-compatible disk (Cloudflare R2 included) this issues a single
 * ranged GetObject — R2 only ever sends the bytes asked for, so a 45-second
 * clip out of a multi-GB WAV master costs us (and the visitor) a few
 * hundred KB, not the whole file. Other disk drivers (local/public — used
 * in dev without live R2 credentials) fall back to a seek + read, which
 * is just as exact, only less bandwidth-efficient, because it's already
 * sitting on local disk.
 */
class RangedStorageReader
{
    public function readRange(string $disk, string $path, int $start, int $length): string
    {
        if ($length <= 0) {
            return '';
        }

        $endInclusive = $start + $length - 1;
        $filesystem = Storage::disk($disk);

        if ($filesystem instanceof AwsS3V3Adapter) {
            $client = $filesystem->getClient();
            $config = $filesystem->getConfig();

            $result = $client->getObject([
                'Bucket' => $config['bucket'],
                'Key' => ltrim($path, '/'),
                'Range' => "bytes={$start}-{$endInclusive}",
            ]);

            return (string) $result['Body'];
        }

        // Fallback for non-S3 disks (local/public), used in local dev.
        $stream = $filesystem->readStream($path);
        if ($stream === null || $stream === false) {
            throw new RuntimeException("Could not open [{$path}] on disk [{$disk}].");
        }

        fseek($stream, $start);
        $data = fread($stream, $length);
        fclose($stream);

        return $data === false ? '' : $data;
    }

    public function fileSize(string $disk, string $path): int
    {
        return (int) Storage::disk($disk)->size($path);
    }

    /**
     * Just enough of the file's start to contain every header we need to
     * parse (WAV chunks, or an MP3's ID3 tag + first frame header).
     */
    public function readPrefix(string $disk, string $path, int $bytes = 262144): string
    {
        return $this->readRange($disk, $path, 0, $bytes);
    }
}
