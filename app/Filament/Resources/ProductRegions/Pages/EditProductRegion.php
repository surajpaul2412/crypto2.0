<?php

namespace App\Filament\Resources\ProductRegions\Pages;

use App\Filament\Resources\ProductRegions\ProductRegionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductRegion extends EditRecord
{
    protected static string $resource = ProductRegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
