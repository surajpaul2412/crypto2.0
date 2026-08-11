<?php

namespace App\Filament\Resources\RecordingInstruments\Pages;

use App\Filament\Resources\RecordingInstruments\RecordingInstrumentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecordingInstrument extends EditRecord
{
    protected static string $resource = RecordingInstrumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
