<?php

namespace App\Filament\Resources\HeritagePerformances\Pages;

use App\Filament\Resources\HeritagePerformances\HeritagePerformanceResource;
use App\Models\HeritagePerformance;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditHeritagePerformance extends EditRecord
{
    protected static string $resource = HeritagePerformanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
