<?php

namespace App\Filament\Resources\MapRegions\Pages;

use App\Filament\Resources\MapRegions\MapRegionResource;
use Filament\Resources\Pages\EditRecord;

class EditMapRegion extends EditRecord
{
    protected static string $resource = MapRegionResource::class;

    protected function getHeaderActions(): array
    {
        // No DeleteAction — states/UTs are a fixed set, deleting a row here
        // would leave that state's map popup with no content.
        return [
            //
        ];
    }
}
