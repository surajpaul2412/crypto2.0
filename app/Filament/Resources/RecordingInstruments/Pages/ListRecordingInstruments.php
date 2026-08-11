<?php

namespace App\Filament\Resources\RecordingInstruments\Pages;

use App\Filament\Resources\RecordingInstruments\RecordingInstrumentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecordingInstruments extends ListRecords
{
    protected static string $resource = RecordingInstrumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
