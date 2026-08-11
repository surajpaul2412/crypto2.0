<?php

namespace App\Filament\Resources\HeritagePerformances\Pages;

use App\Filament\Resources\HeritagePerformances\HeritagePerformanceResource;
use App\Models\HeritagePerformance;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateHeritagePerformance extends CreateRecord
{
    protected static string $resource = HeritagePerformanceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $youtubeId = HeritagePerformance::extractYoutubeId($data['youtube_url']);

        if (! $youtubeId) {
            throw ValidationException::withMessages([
                'youtube_url' => 'Could not find a valid YouTube video ID in that link.',
            ]);
        }

        $data['youtube_id'] = $youtubeId;

        return $data;
    }
}
