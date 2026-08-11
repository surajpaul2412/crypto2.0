<?php

namespace App\Filament\Resources\InstrumentCategories\Pages;

use App\Filament\Resources\InstrumentCategories\InstrumentCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInstrumentCategory extends EditRecord
{
    protected static string $resource = InstrumentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
